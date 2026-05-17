<?php

namespace App\Filament\Admin\Resources\QuizResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('question_text')
                ->label('Pertanyaan')
                ->required(),

            Forms\Components\Select::make('type')
                ->options([
                    'single_choice' => 'Pilihan Ganda',
                    'multiple_choice' => 'Multiple Choice',
                    'essay' => 'Essay',
                ])
                ->default('single_choice')
                ->required(),

            Forms\Components\TextInput::make('points')
                ->numeric()
                ->default(10)
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question_text')
            ->columns([
                Tables\Columns\TextColumn::make('question_text')
                    ->limit(50),

                Tables\Columns\BadgeColumn::make('type'),

                Tables\Columns\TextColumn::make('points'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
