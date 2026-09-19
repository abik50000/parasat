<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttestationLinkResource\Pages;
use App\Models\AttestationLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AttestationLinkResource extends Resource
{
    protected static ?string $model = AttestationLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'Аттестация';

    protected static ?string $navigationLabel = 'Ссылки';

    protected static ?string $modelLabel = 'ссылка';

    protected static ?string $pluralModelLabel = 'Ссылки';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('url')
                        ->label('Ссылка на Google Диск')
                        ->helperText('Адрес папки или файла из Google Drive. Откроется в новой вкладке.')
                        ->url()
                        ->required()
                        ->maxLength(2048)
                        ->placeholder('https://drive.google.com/drive/folders/…')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('sort')
                        ->label('Порядок')
                        ->helperText('Чем меньше число, тем выше ссылка в списке.')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Показывать на сайте')
                        ->default(true),
                ]),

            Forms\Components\Tabs::make('Название ссылки')
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
                    ->label('Название')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('url')
                    ->label('Ссылка')
                    ->limit(60)
                    ->url(fn (AttestationLink $record) => $record->url, shouldOpenInNewTab: true)
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
                Tables\Actions\Action::make('open')
                    ->label('Открыть')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn (AttestationLink $record) => $record->url)
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
            'index' => Pages\ListAttestationLinks::route('/'),
            'create' => Pages\CreateAttestationLink::route('/create'),
            'edit' => Pages\EditAttestationLink::route('/{record}/edit'),
        ];
    }
}
