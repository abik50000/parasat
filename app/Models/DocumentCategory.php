<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentCategory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'sort' => 'integer',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class)->orderBy('sort')->orderBy('id');
    }

    public function publishedDocuments(): HasMany
    {
        return $this->documents()->where('is_published', true);
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
}
