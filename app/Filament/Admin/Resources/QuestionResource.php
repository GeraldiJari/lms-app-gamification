<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\QuestionResource\Pages;
use App\Filament\Admin\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'LMS';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Textarea::make('question_text')
                    ->label('Pertanyaan')
                    ->required()
                    ->rows(5),

                Forms\Components\Select::make('type')
                    ->options([
                        'single_choice' => 'Pilihan Ganda',
                        'multiple_choice' => 'Multiple Choice',
                        'essay' => 'Essay',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('points')
                    ->label('Nilai')
                    ->numeric()
                    ->default(10),

                Forms\Components\Repeater::make('options')
                    ->relationship()
                    ->schema([

                        Forms\Components\TextInput::make('option_text')
                            ->label('Pilihan')
                            ->required(),

                        Forms\Components\Toggle::make('is_correct')
                            ->label('Jawaban Benar'),

                    ])
                    ->columns(2)
                    ->hidden(fn ($get) => $get('type') === 'essay'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question_text')
                    ->limit(50),

                Tables\Columns\TextColumn::make('type'),

                Tables\Columns\TextColumn::make('points'),
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
