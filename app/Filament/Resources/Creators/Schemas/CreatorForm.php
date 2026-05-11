<?php

namespace App\Filament\Resources\Creators\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CreatorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('user_id')
                ->relationship('user', 'email')
                ->required()
                ->searchable(),

            TextInput::make('role')
                ->required(),

            TagsInput::make('tags')
                ->placeholder('New tag')
                ->separator(','),

            FileUpload::make('profile_picture')
                ->image()
                ->disk('public')
                ->directory('creators'),

            Textarea::make('biography')
                ->columnSpanFull(),

            // This is the cleanest way for Filament 5 to handle your JSON experience
            Repeater::make('experience')
                ->schema([
                    TextInput::make('text')
                        ->required(),
                ])
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }
}
