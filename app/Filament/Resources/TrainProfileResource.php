<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Device;
use App\Models\Station;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TrainProfile;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TrainProfileResource\Pages;
use App\Filament\Resources\TrainProfileResource\RelationManagers;

class TrainProfileResource extends Resource
{
    protected static ?string $model = TrainProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Train Profile Name'),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('train_profiles/images'),

                Select::make('device_id')
                    ->label('Device')
                    ->options(function () {
                        // Fetch all devices and exclude those that are already associated with a TrainProfile
                        $associatedDeviceSerialNumbers = TrainProfile::pluck('device_id');
                        return Device::whereNotIn('serial_number', $associatedDeviceSerialNumbers)
                            ->pluck('serial_number', 'serial_number'); // Use serial_number as both key and value
                    })
                    ->required(),

                Select::make('stations') // Use Select with multiple()
                    ->label('Stations')
                    ->multiple() // Enable multiple selection
                    ->relationship('stations', 'name') // The relationship method on TrainProfile model and the attribute to display
                    ->options(Station::all()->pluck('name', 'id')) // Fetch all stations
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('device_id')
                    ->label('Serial Number'),

                TextColumn::make('name')
                    ->label('Train Name'),

                ImageColumn::make('image')
                    ->label('Train Image')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image)),

                TextColumn::make('stations.name')
                    ->label('Stations')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            $stations = Station::whereIn('id', $state)->pluck('name');
                            return implode(', ', $stations->toArray());
                        }

                        if (is_numeric($state)) {
                            return Station::find($state)->name ?? 'Unknown';
                        }

                        return $state;
                    }),
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
            'index' => Pages\ListTrainProfiles::route('/'),
            'create' => Pages\CreateTrainProfile::route('/create'),
            'edit' => Pages\EditTrainProfile::route('/{record}/edit'),
        ];
    }
}
