<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MaterialResource\Pages;
use App\Filament\Admin\Resources\MaterialResource\RelationManagers;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Materi';

    protected static ?string $pluralModelLabel = 'Materi';

    protected static ?string $navigationLabel = 'Materi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Section::make('Material Information')
                    ->schema([

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),

                        Select::make('session_id')
                            ->label('Session')
                            ->relationship(
                                name: 'session',
                                titleAttribute: 'title'
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                    ])
                    ->columns(2),

                Forms\Components\Section::make('Learning Content')
                    ->description(
                        'Susun materi pembelajaran menggunakan berbagai jenis content.'
                    )
                    ->schema([

                        Builder::make('content')
                            ->label('Content')
                            ->blocks([

                                Builder\Block::make('text')
                                    ->label('Text')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([

                                        RichEditor::make('content')
                                            ->label('Text Content')
                                            ->required()
                                            ->columnSpanFull(),

                                    ]),

                                Builder\Block::make('image')
                                    ->label('Image')
                                    ->icon('heroicon-o-photo')
                                    ->schema([

                                        FileUpload::make('image')
                                            ->label('Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('materials/images')
                                            ->required(),

                                    ]),

                                Builder\Block::make('video')
                                    ->label('Video')
                                    ->icon('heroicon-o-video-camera')
                                    ->schema([

                                        TextInput::make('url')
                                            ->label('Video URL')
                                            ->placeholder(
                                                'https://www.youtube.com/watch?v=...'
                                            )
                                            ->url()
                                            ->required()
                                            ->maxLength(2048),

                                    ]),

                                Builder\Block::make('link')
                                    ->label('Link')
                                    ->icon('heroicon-o-link')
                                    ->schema([

                                        TextInput::make('title')
                                            ->label('Link Title')
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->url()
                                            ->required()
                                            ->maxLength(2048),

                                    ])
                                    ->columns(2),

                                Builder\Block::make('file')
                                    ->label('File')
                                    ->icon('heroicon-o-document')
                                    ->schema([

                                        FileUpload::make('file')
                                            ->label('File')
                                            ->disk('public')
                                            ->directory('materials/files')
                                            ->acceptedFileTypes([
                                                'application/pdf',
                                                'application/vnd.ms-powerpoint',
                                                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                                            ])
                                            ->maxSize(51200)
                                            ->required(),

                                    ]),

                            ])
                            ->collapsible()
                            ->cloneable()
                            ->reorderable()
                            ->columnSpanFull(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Material')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('session.title')
                    ->label('Session')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),

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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
