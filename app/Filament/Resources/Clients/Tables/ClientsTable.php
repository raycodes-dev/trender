<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),

                // Show a snippet of the message
                TextColumn::make('message')
                    ->label('Latest Message')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->message), // Hover to see more

                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])

            ->recordActions([

                Action::make('markAsRead')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn ($record) => $record->markAsRead())
                    ->visible(fn ($record) => !$record->is_read), // Only show if unread

                ViewAction::make()
                    ->after(fn ($record) => $record->markAsRead()), // Use the function we just made!

                EditAction::make(),
            ]);
    }
}
