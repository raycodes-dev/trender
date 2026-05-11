<?php

namespace App\Filament\Resources\OurWorks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class OurWorkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->required()
                ->columnSpanFull(),
            Select::make('type')
                ->options([
                    'video' => 'Video Production',
                    'design' => 'Graphic Design',
                    'dev' => 'Development',
                ])
                ->required(),
            Tabs::make('Source')
                ->tabs([
                    Tabs\Tab::make('Video Link')
                        ->schema([
                            TextInput::make('video_link')
                                ->url(),
                        ]),

                    Tabs\Tab::make('Upload Video')
                        ->schema([
                            FileUpload::make('video_path')
                                ->disk('public')
                                ->directory('our-work/videos')
                                ->visibility('public')
                                ->downloadable()
                                ->openable()
                                ->acceptedFileTypes(['video/mp4', 'video/webm'])
                                ->preserveFilenames(),
                        ]),

                    Tabs\Tab::make('Media Library')
                        ->schema([
                            Select::make('existing_video')
                                ->options(function () {
                                    $files = Storage::disk('public')
                                        ->files('our-work/videos');

                                    return collect($files)->mapWithKeys(fn ($file) => [
                                        $file => basename($file),
                                    ]);
                                })
                                ->searchable(),
                        ]),

                ])
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Cover Thumbnail')
                ->image()
                ->disk('public')
                ->directory('our-work/thumbnails')
                ->required(),

            ]);

    }
}
