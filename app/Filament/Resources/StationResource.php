<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Station;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\StationResource\Pages;

class StationResource extends Resource
{
    protected static ?string $model = Station::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Station Name')->required(),
                TextInput::make('code')->label('Station Code')->required(),
                TextInput::make('latitude')->label('Latitude')->required(),
                TextInput::make('longitude')->label('Longitude')->required(),
                TextInput::make('altitude')->label('Altitude')->required(),
                Hidden::make('point')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Station Name')
                ->searchable(),
                TextColumn::make('code')
                    ->label('Station Code')
                    ->searchable(),
                TextColumn::make('altitude')
                    ->label('Altitude'),
                TextColumn::make('point')
                    ->label('Point'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListStations::route('/'),
            'create' => Pages\CreateStation::route('/create'),
            'edit' => Pages\EditStation::route('/{record}/edit'),
        ];
    }
}
