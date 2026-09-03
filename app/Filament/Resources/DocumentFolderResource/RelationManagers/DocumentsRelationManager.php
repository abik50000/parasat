<?php

namespace App\Filament\Resources\DocumentFolderResource\RelationManagers;

use App\Filament\Forms\DocumentFields;
use App\Models\Document;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $title = 'Файлы в этой папке';

    protected static ?string $modelLabel = 'файл';

    protected static ?string $pluralModelLabel = 'Файлы';

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

    public function form(Form $form): Form
    {
        return $form->schema(DocumentFields::make());
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
