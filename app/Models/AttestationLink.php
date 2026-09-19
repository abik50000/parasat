<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AttestationLink extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'sort' => 'integer',
    ];

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
