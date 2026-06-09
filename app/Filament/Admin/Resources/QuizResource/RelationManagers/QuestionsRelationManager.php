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
        return $form
            ->schema([

                Forms\Components\Section::make('Informasi Soal')
                    ->schema([
                        Forms\Components\Textarea::make('question_text')
                            ->label('Pertanyaan')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),


                        Forms\Components\Select::make('type')
                            ->label('Jenis Soal')
                            ->options([
                                'single_choice' => 'Pilihan Ganda (1 Jawaban)',
                                'multiple_choice' => 'Pilihan Ganda (Banyak Jawaban)',
                                'essay' => 'Essay',
                            ])
                            ->default('single_choice')
                            ->live()
                            ->required(),

                        Forms\Components\TextInput::make('points')
                            ->label('Nilai')
                            ->numeric()
                            ->default(10),

                    ])
                    ->columns(2),

                    Forms\Components\Section::make('Pilihan Jawaban')
                        ->schema([

                            Forms\Components\Repeater::make('options')
                                ->relationship('options')
                                ->schema([

                                    Forms\Components\TextInput::make('option_text')
                                        ->label('Isi Pilihan')
                                        ->required(),

                                    Forms\Components\Toggle::make('is_correct')
    ->label('Jawaban Benar')
    ->live()
    ->afterStateUpdated(function ($state, $set, $get) {

        if (!$state) {
            return;
        }

        if ($get('../../type') !== 'single_choice') {
            return;
        }

        $currentOptionText = $get('option_text');

        $options = $get('../../options');

        foreach ($options as $index => $option) {

            if (($option['option_text'] ?? '') !== $currentOptionText) {
                $options[$index]['is_correct'] = false;
            }
        }

        $set('../../options', $options);
    }),

                                ])
                                // ->columns(1)
                                // ->defaultItems(4)
                                // ->live()
                                // ->afterStateUpdated(function ($state, $set, $get) {

                                //     if ($get('type') !== 'single_choice') {
                                //         return;
                                //     }

                                //     $options = $state;

                                //     // cari item yang baru aktif
                                //     $activeIndex = null;

                                //     foreach ($options as $index => $option) {

                                //         if (($option['is_correct'] ?? false) === true) {
                                //             $activeIndex = $index;
                                //         }

                                //     }

                                //     if ($activeIndex === null) {
                                //         return;
                                //     }


                                //     foreach ($options as $index => $option) {

                                //         $options[$index]['is_correct'] =
                                //             $index === $activeIndex;

                                //     }


                                //     $set('options', $options);

                                // })
                                ->columns(3)
                                ->defaultItems(4)
                                ->addActionLabel('Tambah Pilihan'),

                    ])
                    ->hidden(fn ($get) => $get('type') === 'essay'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question_text')
            ->columns([
                Tables\Columns\TextColumn::make('question_text')
                    ->label('Pertanyaan')
                    ->limit(50),

                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->colors([
                        'success' => 'single_choice',
                        'warning' => 'multiple_choice',
                        'danger' => 'essay',
                    ]),

                Tables\Columns\TextColumn::make('points')
                    ->label('Nilai'),
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
