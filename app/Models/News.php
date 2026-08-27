<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    /** Available category keys. Labels live in lang/{locale}/pages.php → news.categories. */
    public const CATEGORIES = ['events', 'study', 'sport', 'achievements'];

    protected $table = 'news';

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'date',
    ];

    /** Options map for the Filament select (admin UI is Russian). */
    public static function categoryOptions(): array
    {
        return collect(self::CATEGORIES)
            ->mapWithKeys(fn (string $key) => [$key => self::categoryLabelFor($key, 'ru')])
            ->all();
    }

    public static function categoryLabelFor(string $key, ?string $locale = null): string
    {
        return __("pages.news.categories.$key", [], $locale);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /** Localised field with fallback to the Russian value. */
    protected function localized(string $field): string
    {
        $locale = app()->getLocale();

        return (string) ($this->{"{$field}_{$locale}"} ?: $this->{"{$field}_ru"} ?: '');
    }

    public function title(): string
    {
        return $this->localized('title');
    }

    public function body(): string
    {
        return $this->localized('body');
    }

    public function excerpt(): string
    {
        $excerpt = $this->localized('excerpt');

        return $excerpt !== '' ? $excerpt : Str::limit(strip_tags($this->body()), 160);
    }

    public function categoryLabel(): ?string
    {
        return $this->category ? __("pages.news.categories.{$this->category}") : null;
    }

    /** Public URL for the image — supports both uploaded files and legacy public/images paths. */
    public function imageUrl(): string
    {
        if ($this->image === '' || Str::startsWith($this->image, ['http://', 'https://', '/'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, ['images/', 'img/'])) {
            return asset($this->image);
        }

        return Storage::disk('public')->url($this->image);
    }
}
