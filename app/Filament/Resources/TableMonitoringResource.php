<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableMonitoringResource\Pages;
use App\Filament\Resources\TableMonitoringResource\RelationManagers;
use App\Models\TableMonitoring;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableMonitoringResource extends Resource
{
    protected static ?string $model = TableMonitoring::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_ralok')
                ->required(),
            Forms\Components\TextInput::make('latitude')
                ->required()
                ->maxLength(255)
                ->prefix('-111.111'),
            Forms\Components\TextInput::make('longitude')
                ->required()
                ->maxLength(255)
                ->prefix('1111.1111'),
            Forms\Components\TextInput::make('section')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('input_voltage')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('output_voltage')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('voltage')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('clasification')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('power_transmite')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('SWR')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_ralok')
                ->searchable(),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('longitude'),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('input_voltage'),
                Tables\Columns\TextColumn::make('output_voltage'),
                Tables\Columns\TextColumn::make('voltage'),
                Tables\Columns\TextColumn::make('clasification'),
                Tables\Columns\TextColumn::make('power_transmite'),
                Tables\Columns\TextColumn::make('SWR'),
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
            'index' => Pages\ListTableMonitorings::route('/'),
            'create' => Pages\CreateTableMonitoring::route('/create'),
            'edit' => Pages\EditTableMonitoring::route('/{record}/edit'),
        ];
    }
}
