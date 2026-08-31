<?php

namespace App\Filament\Resources\DocumentCategoryResource\RelationManagers;

use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $title = 'Файлы';

    protected static ?string $modelLabel = 'файл';

    protected static ?string $pluralModelLabel = 'Файлы';

    /** Extension → badge colour, mirrors Document::iconType(). */
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

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('file')
                ->label('Файл')
                ->disk('public')
                ->directory('documents')
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title_ru')
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Название')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('original_name')
                    ->label('Файл')
                    ->getStateUsing(fn (Document $record) => $record->fileName())
                    ->color('gray')
                    ->limit(40),

                Tables\Columns\TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->getStateUsing(fn (Document $record) => strtoupper($record->extension()) ?: '—')
                    ->color(fn (Document $record) => self::TYPE_COLORS[$record->iconType()] ?? 'gray'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('На сайте')
                    ->boolean(),
            ])
            ->defaultSort('sort')
            ->reorderable('sort')
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Добавить файл'),
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
}
