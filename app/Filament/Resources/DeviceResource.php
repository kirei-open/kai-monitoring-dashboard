<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Device;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Contexts\Create;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DeviceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DeviceResource\RelationManagers;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-tablet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->required()
                    ->unique(ignoreRecord:true),
                TextInput::make('name')
                    ->label('Device Name')
                    ->required(),
                TextInput::make('code')
                    ->label('Device Code')
                    ->required(),
                Hidden::make('api_key')
            ])
            ->context('create', function ($context) {
                $context->submit(function (Device $device) {
                    $device->save();
                });
            });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_number')
                    ->label('Serial Number'),
                TextColumn::make('name')
                    ->label('Device Name')
                    ->searchable(),
                TextColumn::make('code')
                    ->label('Device Code')
                    ->searchable(),
                TextColumn::make('last_location')
                    ->label('Last Location'),
                TextColumn::make('last_monitored_value')
                    ->label('Last Monitored Value'),
                TextColumn::make('api_key')
                    ->label('API Key')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
