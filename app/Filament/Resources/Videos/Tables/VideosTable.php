<?php

namespace App\Filament\Resources\Videos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail_link')
                    ->label('Preview'),

                TextColumn::make('creator.user.email')
                    ->label('Creator'),

                // Custom Column to show Source Type
                TextColumn::make('source')
                    ->label('Source')
                    ->state(function ($record) {
                        return $record->video_path ? 'Uploaded File' : 'External Link';
                    })
                    ->badge()
                    ->color(fn ($state) => $state === 'Uploaded File' ? 'success' : 'warning'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
