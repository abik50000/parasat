<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentFolderResource\Pages;
use App\Filament\Resources\DocumentFolderResource\RelationManagers\DocumentsRelationManager;
use App\Models\DocumentFolder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentFolderResource extends Resource
{
    protected static ?string $model = DocumentFolder::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationGroup = 'Аттестация';

    protected static ?string $navigationLabel = 'Папки';

    protected static ?string $modelLabel = 'папка';

    protected static ?string $pluralModelLabel = 'Папки';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('parent_id')
                        ->label('Родительская папка')
                        ->placeholder('— Корень (Аттестация) —')
                        ->options(fn (?DocumentFolder $record) => DocumentFolder::parentOptions($record?->id))
                        ->searchable()
                        ->native(false)
                        ->helperText('Оставьте пустым, чтобы папка была на верхнем уровне.'),

                    Forms\Components\TextInput::make('sort')
                        ->label('Порядок')
                        ->helperText('Чем меньше число, тем выше папка в списке.')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Показывать на сайте')
                        ->default(true),
                ]),

            Forms\Components\Tabs::make('Название папки')
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
                    ->label('Папка')
                    ->description(fn (DocumentFolder $record) => $record->parent_id ? $record->titlePath() : null)
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('children_count')
                    ->counts('children')
                    ->label('Подпапок')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('documents_count')
                    ->counts('documents')
                    ->label('Файлов')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('На сайте')
                    ->boolean(),
            ])
            ->defaultSort('sort')
            ->reorderable('sort')
            ->filters([
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Родительская папка')
                    ->options(fn () => DocumentFolder::parentOptions()),
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
            'index' => Pages\ListDocumentFolders::route('/'),
            'create' => Pages\CreateDocumentFolder::route('/create'),
            'edit' => Pages\EditDocumentFolder::route('/{record}/edit'),
        ];
    }
}
