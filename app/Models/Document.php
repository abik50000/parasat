<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Document extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'sort' => 'integer',
    ];

    /** Maps a file extension to a broad icon type used by the frontend. */
    protected const ICON_MAP = [
        'pdf' => 'pdf',
        'doc' => 'word', 'docx' => 'word', 'rtf' => 'word', 'odt' => 'word',
        'xls' => 'excel', 'xlsx' => 'excel', 'csv' => 'excel', 'ods' => 'excel',
        'ppt' => 'powerpoint', 'pptx' => 'powerpoint', 'odp' => 'powerpoint',
        'jpg' => 'image', 'jpeg' => 'image', 'png' => 'image', 'gif' => 'image',
        'webp' => 'image', 'svg' => 'image', 'bmp' => 'image', 'heic' => 'image',
        'zip' => 'archive', 'rar' => 'archive', '7z' => 'archive', 'tar' => 'archive', 'gz' => 'archive',
        'txt' => 'text',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(DocumentFolder::class, 'document_folder_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /** Localised title with fallback to the Russian value. */
    public function title(): string
    {
        $locale = app()->getLocale();

        return (string) ($this->{"title_{$locale}"} ?: $this->title_ru ?: '');
    }

    /** Human-facing file name, e.g. "Устав школы.pdf". */
    public function fileName(): string
    {
        return $this->original_name ?: basename((string) $this->file);
    }

    public function extension(): string
    {
        return Str::lower(pathinfo($this->fileName(), PATHINFO_EXTENSION));
    }

    /** Broad icon type: pdf | word | excel | powerpoint | image | archive | text | file. */
    public function iconType(): string
    {
        return self::ICON_MAP[$this->extension()] ?? 'file';
    }

    public function url(): string
    {
        if (Str::startsWith($this->file, ['http://', 'https://', '/'])) {
            return $this->file;
        }

        return Storage::disk('public')->url($this->file);
    }

    public function exists(): bool
    {
        if (Str::startsWith($this->file, ['http://', 'https://', '/'])) {
            return true;
        }

        return Storage::disk('public')->exists($this->file);
    }

    /** Human-readable size, e.g. "1.4 MB". Empty string when unknown. */
    public function humanSize(): string
    {
        if (Str::startsWith($this->file, ['http://', 'https://', '/'])
            || ! Storage::disk('public')->exists($this->file)) {
            return '';
        }

        $bytes = Storage::disk('public')->size($this->file);
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;

        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return ($i === 0 ? $bytes : number_format($bytes, 1)).' '.$units[$i];
    }
}
