<?php

namespace App\Filament\Resources\OurWorks;

use App\Filament\Resources\OurWorks\Pages\CreateOurWork;
use App\Filament\Resources\OurWorks\Pages\EditOurWork;
use App\Filament\Resources\OurWorks\Pages\ListOurWorks;
use App\Filament\Resources\OurWorks\Pages\ViewOurWork;
use App\Filament\Resources\OurWorks\Schemas\OurWorkForm;
use App\Filament\Resources\OurWorks\Schemas\OurWorkInfolist;
use App\Filament\Resources\OurWorks\Tables\OurWorksTable;
use App\Models\our_work;
use App\Models\OurWork;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OurWorkResource extends Resource
{
    protected static ?string $model = our_work::class;
    //name
//    protected static ?string $name = 'our_work';
    protected static ?string $modelLabel = 'Our Work';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleGroup;

    public static function form(Schema $schema): Schema
    {
        return OurWorkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OurWorkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OurWorksTable::configure($table);
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
            'index' => ListOurWorks::route('/'),
            'create' => CreateOurWork::route('/create'),
            'view' => ViewOurWork::route('/{record}'),
            'edit' => EditOurWork::route('/{record}/edit'),
        ];
    }
}
