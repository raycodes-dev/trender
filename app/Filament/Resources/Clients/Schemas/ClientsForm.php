<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('ip'),
                Textarea::make('message')
                    ->label('Client Message')
                    ->rows(5)
                    ->columnSpanFull()
                    ->readOnly(), // Prevents accidental editing of the client's original words
            ]);
    }
}
