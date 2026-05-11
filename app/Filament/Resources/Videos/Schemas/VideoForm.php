<?php

namespace App\Filament\Resources\Videos\Schemas;

use App\Models\Creator;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('creator_id')
                ->label('Creator')
                ->relationship('creator', 'id')
                ->getOptionLabelFromRecordUsing(fn (Creator $record) => $record->user->email)
                ->searchable()
                ->preload()
                ->required(),
            // Using a Tab or a Select to choose the upload method
            Tabs::make('Video Source')
                ->tabs([
                    Tabs\Tab::make('External Link')
                        ->icon('heroicon-o-link')
                        ->schema([
                            TextInput::make('video_link')
                                ->url()
                                ->placeholder('https://youtube.com/watch?v=...')
                                ->helperText('Enter the URL from YouTube, Vimeo, or a CDN.'),
                        ]),

                    Tabs\Tab::make('Direct Upload')
                        ->icon('heroicon-o-arrow-up-tray')
                        ->schema([
                            FileUpload::make('video_path')
                                ->disk('public')
                                ->label('Upload Video File')
                                ->directory('library/videos')
                                ->visibility('public')
                                ->acceptedFileTypes(['video/mp4', 'video/ogg', 'video/webm'])
                                ->maxSize(102400), // 100MB limit (adjust based on your server)
                        ]),
                ])
                ->columnSpanFull(),

            FileUpload::make('thumbnail_link')
                ->disk('public')
                ->directory('library/thumbnails')
                ->image()
                ->label('Thumbnail Image'),
        ]);
    }
}
