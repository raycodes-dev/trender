<?php

namespace App\Filament\Resources\Creators\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CreatorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('role'),
                TextEntry::make('biography')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('profile_picture')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
