<?php

namespace App\Filament\Forms;

use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Get;

/**
 * Shared form fields for a Document — used by DocumentResource and by the
 * "files in this folder" relation manager under DocumentFolderResource.
 *
 * A file can be either uploaded or referenced by an external URL. Both end up
 * in the `file` column: the upload writes a storage path, the URL is written
 * through the Document::$fileUrl virtual attribute.
 */
class DocumentFields
{
    public static function make(): array
    {
        $isLink = fn (Get $get): bool => $get('file_source') === 'link';
        $isUpload = fn (Get $get): bool => $get('file_source') !== 'link';

        return [
            Forms\Components\ToggleButtons::make('file_source')
                ->label('Источник файла')
                ->options([
                    'upload' => 'Загрузить файл',
                    'link' => 'Ссылка на файл',
                ])
                ->icons([
                    'upload' => 'heroicon-o-arrow-up-tray',
                    'link' => 'heroicon-o-link',
                ])
                ->inline()
                ->default('upload')
                ->dehydrated(false)
                ->live()
                ->afterStateHydrated(function (Forms\Components\ToggleButtons $component, $state, ?Document $record) {
                    if (filled($state)) {
                        return;
                    }

                    $component->state($record?->isExternal() ? 'link' : 'upload');
                })
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('file')
                ->label('Файл')
                ->disk('public')
                ->directory('attestation')
                ->visibility('public')
                ->storeFileNamesIn('original_name')
                ->downloadable()
                ->openable()
                ->maxSize(51200)
                ->helperText('До 50 МБ.')
                ->visible($isUpload)
                ->dehydrated($isUpload)
                ->required($isUpload)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('file_url')
                ->label('Ссылка на файл (URL)')
                ->placeholder('https://example.com/docs/prikaz-2024.pdf')
                ->helperText('Прямая ссылка на файл (обычно заканчивается на .pdf) — по ней определяются иконка и подпись.')
                ->url()
                ->maxLength(2048)
                ->visible($isLink)
                ->dehydrated($isLink)
                ->required($isLink)
                ->columnSpanFull(),

            Forms\Components\Tabs::make('Название файла')
                ->columnSpanFull()
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Русский')->schema([
                        Forms\Components\TextInput::make('title_ru')
                            ->label('Название')
                            ->helperText('Показывается посетителям вместо имени файла.')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Forms\Components\Tabs\Tab::make('Қазақша')->schema([
                        Forms\Components\TextInput::make('title_kz')
                            ->label('Название')
                            ->maxLength(255),
                    ]),
                    Forms\Components\Tabs\Tab::make('English')->schema([
                        Forms\Components\TextInput::make('title_en')
                            ->label('Название')
                            ->maxLength(255),
                    ]),
                ]),

            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('sort')
                    ->label('Порядок')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('is_published')
                    ->label('Показывать на сайте')
                    ->default(true),
            ]),
        ];
    }
}
