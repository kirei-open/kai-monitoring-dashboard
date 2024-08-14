<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Measurement;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MeasurementResource\Pages;

class MeasurementResource extends Resource
{
    protected static ?string $model = Measurement::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $deviceIds = Measurement::query()
            ->groupBy('device_id')
            ->pluck('device_id', 'device_id')
            ->toArray();

        $keys = Measurement::query()
            ->groupBy('key')
            ->pluck('key', 'key')
            ->toArray();

        return $table
            ->columns([
                TextColumn::make('device_id')
                    ->label('Device Id'),
                TextColumn::make('key')
                    ->label('Key'),
                TextColumn::make('value')
                    ->label('Value'),
                TextColumn::make('unit')
                    ->label('Unit')
            ])
            ->filters([
                SelectFilter::make('device_id', 'Device ID')
                    ->options(array_merge($deviceIds))
                    ->query(function (Builder $query, array $data) {
                        $value = $data['value'] ?? null;
                        if ($value !== null && $value !== 'All' && $value !== '') {
                            $query->where('device_id', $value);
                        }
                    })
                    ->default(''),

                SelectFilter::make('key', 'Key')
                    ->options(array_merge($keys))
                    ->query(function (Builder $query, array $data) {
                        $value = $data['value'] ?? null;
                        if ($value !== null && $value !== 'All' && $value !== '') {
                            $query->where('key', $value);
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
            'index' => Pages\ListMeasurements::route('/'),
            'create' => Pages\CreateMeasurement::route('/create'),
            'edit' => Pages\EditMeasurement::route('/{record}/edit'),
        ];
    }
}
