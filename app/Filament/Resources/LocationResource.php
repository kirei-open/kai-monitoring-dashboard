<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Location;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LocationResource\Pages;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $deviceIds = Location::query()
            ->groupBy('device_id')
            ->pluck('device_id', 'device_id')
            ->toArray();

        return $table
            ->columns([
                TextColumn::make('device_id')
                    ->label('Device Id'),
                TextColumn::make('datetime')
                    ->label('Datetime'),
                TextColumn::make('point')
                    ->label('Point')
            ])
            ->filters([
                SelectFilter::make('device_id', 'Device ID')
                    ->options($deviceIds)
                    ->query(function (Builder $query, array $data) {
                        $value = $data['value'] ?? null;
                        if ($value !== null) {
                            $query->where('device_id', $value);
                        }
                    })
                    ->default('')
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
