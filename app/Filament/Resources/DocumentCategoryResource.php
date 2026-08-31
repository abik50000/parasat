<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentCategoryResource\Pages;
use App\Filament\Resources\DocumentCategoryResource\RelationManagers\DocumentsRelationManager;
use App\Models\DocumentCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentCategoryResource extends Resource
{
    protected static ?string $model = DocumentCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationLabel = 'Документы';

    protected static ?string $modelLabel = 'группа документов';

    protected static ?string $pluralModelLabel = 'Документы';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('sort')
                        ->label('Порядок')
                        ->helperText('Чем меньше число, тем выше группа на странице.')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Показывать на сайте')
                        ->default(true),
                ]),

            Forms\Components\Tabs::make('Название группы')
                ->columnSpanFull()
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Русский')->schema([
                        Forms\Components\TextInput::make('title_ru')
                            ->label('Название')
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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Группа')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('documents_count')
                    ->label('Файлов')
                    ->counts('documents')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('На сайте')
                    ->boolean(),
            ])
            ->defaultSort('sort')
            ->reorderable('sort')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Опубликовано'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            DocumentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocumentCategories::route('/'),
            'create' => Pages\CreateDocumentCategory::route('/create'),
            'edit' => Pages\EditDocumentCategory::route('/{record}/edit'),
        ];
    }
}
