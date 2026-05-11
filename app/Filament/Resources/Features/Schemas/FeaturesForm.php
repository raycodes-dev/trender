<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeaturesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Feature Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),

                    FileUpload::make('icon')
                        ->image()
                        ->directory('site-assets/icons')
                        ->required(),

                    Textarea::make('info')
                        ->label('Description')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }
}
