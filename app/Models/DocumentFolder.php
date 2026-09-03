<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class DocumentFolder extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'sort' => 'integer',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort')->orderBy('id');
    }

    public function publishedChildren(): HasMany
    {
        return $this->children()->where('is_published', true);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class)->orderBy('sort')->orderBy('id');
    }

    public function publishedDocuments(): HasMany
    {
        return $this->documents()->where('is_published', true);
    }

    public function scopeRoots(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort')->orderBy('id');
    }

    /** Localised title with fallback to the Russian value. */
    public function title(): string
    {
        $locale = app()->getLocale();

        return (string) ($this->{"title_{$locale}"} ?: $this->title_ru ?: '');
    }

    /** Breadcrumb-style path of Russian titles, e.g. "Аттестация педагогов / 2024–2025". */
    public function titlePath(string $separator = ' / '): string
    {
        $parts = [];
        $node = $this;
        $guard = 0;

        while ($node && $guard++ < 25) {
            array_unshift($parts, $node->title_ru);
            $node = $node->parent;
        }

        return implode($separator, $parts);
    }

    /**
     * Options for a parent-folder <select>: [id => "Path / To / Folder"].
     * Pass $excludeId to drop a folder together with its whole subtree
     * (prevents choosing a descendant as the parent and creating a cycle).
     */
    public static function parentOptions(?int $excludeId = null): array
    {
        $all = self::query()->orderBy('parent_id')->orderBy('sort')->orderBy('id')->get();
        $byParent = $all->groupBy(fn (self $f) => $f->parent_id ?? 0);
        $byId = $all->keyBy('id');

        $excluded = [];
        if ($excludeId) {
            $stack = [$excludeId];
            while ($stack) {
                $id = array_pop($stack);
                if (isset($excluded[$id])) {
                    continue;
                }
                $excluded[$id] = true;
                foreach ($byParent->get($id, new Collection) as $child) {
                    $stack[] = $child->id;
                }
            }
        }

        $pathOf = function (self $folder) use ($byId): string {
            $parts = [];
            $node = $folder;
            $guard = 0;
            while ($node && $guard++ < 25) {
                array_unshift($parts, $node->title_ru);
                $node = $node->parent_id ? $byId->get($node->parent_id) : null;
            }

            return implode(' / ', $parts);
        };

        return $all->reject(fn (self $f) => isset($excluded[$f->id]))
            ->mapWithKeys(fn (self $f) => [$f->id => $pathOf($f)])
            ->all();
    }

    /**
     * The published folder tree plus a flat list, ready for the frontend.
     * Shape: ['tree' => [...nested folders with files...], 'flat' => [...folders that hold files...]].
     */
    public static function publicPayload(): array
    {
        $folders = self::query()->published()->ordered()
            ->with(['publishedDocuments'])
            ->get();

        $byParent = $folders->groupBy(fn (self $f) => $f->parent_id ?? 0);

        $files = fn (self $folder) => $folder->publishedDocuments->map(fn (Document $d) => [
            'name' => $d->title(),
            'file' => $d->fileName(),
            'ext' => strtoupper($d->extension()) ?: 'FILE',
            'type' => $d->iconType(),
            'size' => $d->humanSize(),
            'url' => $d->url(),
        ])->values()->all();

        $build = function (int $parentId) use (&$build, $byParent, $files): array {
            return $byParent->get($parentId, new Collection)->map(fn (self $f) => [
                'id' => $f->id,
                'name' => $f->title(),
                'folders' => $build($f->id),
                'files' => $files($f),
            ])->values()->all();
        };

        $tree = $build(0);

        $flat = [];
        $walk = function (array $nodes, array $trail) use (&$walk, &$flat): void {
            foreach ($nodes as $node) {
                $path = array_merge($trail, [$node['name']]);
                if (! empty($node['files'])) {
                    $flat[] = ['path' => implode(' / ', $path), 'files' => $node['files']];
                }
                $walk($node['folders'], $path);
            }
        };
        $walk($tree, []);

        return ['tree' => $tree, 'flat' => $flat];
    }
}
