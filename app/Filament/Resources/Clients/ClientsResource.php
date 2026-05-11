<?php

namespace App\Filament\Resources\Clients;

use App\Filament\Resources\Clients\Pages\CreateClients;
use App\Filament\Resources\Clients\Pages\EditClients;
use App\Filament\Resources\Clients\Pages\ListClients;
use App\Filament\Resources\Clients\Pages\ViewClients;
use App\Filament\Resources\Clients\Schemas\ClientsForm;
use App\Filament\Resources\Clients\Schemas\ClientsInfolist;
use App\Filament\Resources\Clients\Tables\ClientsTable;
use App\Models\Clients;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    /**
     * This adds the numerical badge to the sidebar
     */
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::unread()->count() ?: null;
    }

    /**
     * Optional: Change the badge color (e.g., make it amber/warning)
     */
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Briefcase;

//    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ClientsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClientsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'create' => CreateClients::route('/create'),
            'view' => ViewClients::route('/{record}'),
            'edit' => EditClients::route('/{record}/edit'),
        ];
    }
}
