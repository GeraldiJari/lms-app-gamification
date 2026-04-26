<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CourseResource\Pages;
use App\Filament\Admin\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Kursus';
    protected static ?string $pluralModelLabel = 'Kursus';
    protected static ?string $navigationLabel = 'Kursus';

    // public static function form(Form $form): Form
    // {
    //     return $form->schema([
    //         Section::make('Informasi Course')
    //             ->schema([
    //                 TextInput::make('name')
    //                     ->label('Nama Course')
    //                     ->required()
    //                     ->maxLength(255),

    //                 Textarea::make('description')
    //                     ->label('Deskripsi')
    //                     ->rows(3),

    //                 Select::make('teacher_id')
    //                     ->label('Pengajar')
    //                     ->relationship('users', 'name')
    //                     ->searchable()
    //                     ->preload()
    //                     ->required(),
    //             ])
    //             ->columns(2),
    //     ]);
    // }

    public static function form(Form $form): Form
{
    return $form->schema([
        Grid::make(3)
            ->schema([
                
                // FORM INPUT
                Section::make('Informasi Course')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Course')
                            ->required()
                            ->live() // 🔥 penting untuk preview realtime
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->live(),

                        Select::make('teacher_id')
                            ->label('Pengajar')
                            ->relationship('users', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->columnSpan(2),

                // 🔥 PREVIEW (feel UI siswa)
                Section::make('Preview (Siswa)')
                    ->schema([
                        Placeholder::make('preview_card')
                            ->label('')
                            ->content(function ($get) {
                                $name = $get('name') ?? 'Nama Course';
                                $desc = $get('description') ?? 'Deskripsi course...';

                                return "📘 {$name}\n\n{$desc}\n\n🎯 Progress: 0%";
                            }),
                    ])
                    ->columnSpan(1),
            ])
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->limit(30),

                TextColumn::make('users.name')
                    ->label('Pengajar'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
