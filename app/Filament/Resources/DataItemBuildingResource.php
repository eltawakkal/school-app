<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataItemBuildingResource\Pages;
use App\Filament\Resources\DataItemBuildingResource\RelationManagers;
use App\Models\DataItemBuilding;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataItemBuildingResource extends Resource
{
    protected static ?string $model = DataItemBuilding::class;

    protected static ?int $navigationSort = 100;
    protected static ?string $navigationGroup = 'Basis Data Item';
    protected static ?string $navigationLabel = 'Data Bangunan';
    protected static ?string $label = 'Data Bangunan';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Bangunan')
                        ->required(),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Bangunan')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDataItemBuildings::route('/'),
        ];
    }
}
