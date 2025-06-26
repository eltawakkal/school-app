<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataItemPositionResource\Pages;
use App\Filament\Resources\DataItemPositionResource\RelationManagers;
use App\Models\DataItemPosition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataItemPositionResource extends Resource
{
    protected static ?string $model = DataItemPosition::class;

    protected static ?int $navigationSort = 99;
    protected static ?string $navigationGroup = 'Basis Data Item';
    protected static ?string $navigationLabel = 'Data Posisi';
    protected static ?string $label = 'Data Posisi Item';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Posisi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Posisi')
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
            'index' => Pages\ManageDataItemPositions::route('/'),
        ];
    }
}
