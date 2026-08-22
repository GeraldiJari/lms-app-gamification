<?php

namespace App\Filament\Admin\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class MaterialContentSchema
{
    public static function make(): Builder
    {
        return Builder::make('content')
            ->label('Konten Materi')
            ->helperText(
                'Susun materi dari atas ke bawah. Urutan akan menjadi urutan tampil materi bagi siswa.'
            )
            ->blocks([

                // TEXT
                Builder\Block::make('text')
                    ->label('Text')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Content')                
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                    ]),

                // IMAGE
                Builder\Block::make('image')
                    ->label('Image')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('materials/images')
                            ->visibility('public')
                            ->required(),
                    ]),

                // VIDEO
                Builder\Block::make('video')
                    ->label('Video')
                    ->icon('heroicon-o-video-camera')
                    ->schema([
                        TextInput::make('url')
                            ->label('YouTube URL')
                            ->helperText(
                                'Masukkan URL YouTube. Contoh: https://www.youtube.com/watch?v=...'
                            )
                            ->url()
                            ->placeholder(
                                'https://www.youtube.com/watch?v=...'
                            )
                            ->required(),
                    ]),

                // LINK
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
                            ->placeholder(
                                'https://example.com'
                            )
                            ->required(),
                    ]),

                // FILE / PDF
                Builder\Block::make('file')
                    ->label('File / PDF')
                    ->icon('heroicon-o-document')
                    ->schema([
                        FileUpload::make('file')
                            ->label('File')
                            ->disk('public')
                            ->directory('materials/files')
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'application/pdf',
                            ])
                            ->maxSize(10240)
                            ->required(),
                    ]),
            ])
            ->columnSpanFull();
    }
}