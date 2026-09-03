<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Models\Document;
use App\Models\DocumentFolder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Аттестация';

    protected static ?string $navigationLabel = 'Файлы';

    protected static ?string $modelLabel = 'файл';

    protected static ?string $pluralModelLabel = 'Файлы';

    protected static ?int $navigationSort = 2;

    /** Icon type → badge colour, mirrors Document::iconType(). */
    protected const TYPE_COLORS = [
        'pdf' => 'danger',
        'word' => 'info',
        'excel' => 'success',
        'powerpoint' => 'warning',
        'image' => 'primary',
        'archive' => 'gray',
        'text' => 'gray',
        'file' => 'gray',
    ];

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('document_folder_id')
                ->label('Папка')
                ->options(fn () => DocumentFolder::parentOptions())
                ->searchable()
                ->native(false)
                ->required()
                ->helperText('Папки создаются в разделе «Аттестация → Папки».')
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
                ->required()
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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Название')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('folder_path')
                    ->label('Папка')
                    ->getStateUsing(fn (Document $record) => $record->folder?->titlePath() ?? '—')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->getStateUsing(fn (Document $record) => strtoupper($record->extension()) ?: '—')
                    ->color(fn (Document $record) => self::TYPE_COLORS[$record->iconType()] ?? 'gray'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('На сайте')
                    ->boolean(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('document_folder_id')
                    ->label('Папка')
                    ->options(fn () => DocumentFolder::parentOptions()),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Опубликовано'),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Скачать')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Document $record) => $record->url())
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
