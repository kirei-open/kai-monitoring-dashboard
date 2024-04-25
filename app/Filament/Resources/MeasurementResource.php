<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeasurementResource\Pages;
use App\Filament\Resources\MeasurementResource\RelationManagers;
use App\Models\Measurement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                //
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
