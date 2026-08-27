<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $modelLabel = 'новость';

    protected static ?string $pluralModelLabel = 'Новости';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Картинка')
                        ->image()
                        ->imageEditor()
                        ->directory('news')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\Select::make('category')
                        ->label('Рубрика')
                        ->options(News::categoryOptions())
                        ->native(false),

                    Forms\Components\DatePicker::make('published_at')
                        ->label('Дата публикации')
                        ->default(now())
                        ->required(),

                    Forms\Components\TextInput::make('slug')
                        ->label('URL (slug)')
                        ->helperText('Латиницей, для адреса /news/…. Заполнится автоматически из русского заголовка.')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Опубликовано')
                        ->default(true),
                ]),

            Forms\Components\Tabs::make('Переводы')
                ->columnSpanFull()
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Русский')->schema(self::translationFields('ru', required: true)),
                    Forms\Components\Tabs\Tab::make('Қазақша')->schema(self::translationFields('kz')),
                    Forms\Components\Tabs\Tab::make('English')->schema(self::translationFields('en')),
                ]),
        ]);
    }

    protected static function translationFields(string $locale, bool $required = false): array
    {
        return [
            Forms\Components\TextInput::make("title_{$locale}")
                ->label('Заголовок')
                ->required($required)
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, Forms\Set $set) use ($locale) {
                    if ($locale === 'ru' && filled($state)) {
                        $set('slug', Str::slug($state));
                    }
                }),

            Forms\Components\Textarea::make("excerpt_{$locale}")
                ->label('Краткое описание (для карточки)')
                ->rows(3)
                ->maxLength(500),

            Forms\Components\Textarea::make("body_{$locale}")
                ->label('Полный текст')
                ->rows(10),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('')
                    ->getStateUsing(fn (News $record) => $record->imageUrl())
                    ->square(),

                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(60)
                    ->wrap(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Рубрика')
                    ->badge()
                    ->formatStateUsing(fn (?string $state) => $state ? News::categoryLabelFor($state, 'ru') : '—'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Опубл.')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Рубрика')
                    ->options(News::categoryOptions()),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
