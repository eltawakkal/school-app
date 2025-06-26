<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataManagerResource\Pages;
use App\Filament\Resources\DataManagerResource\RelationManagers;
use App\Models\DataManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataManagerResource extends Resource
{
    protected static ?string $model = DataManager::class;

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Database';
    protected static ?string $navigationLabel = 'Data Pengurus';
    protected static ?string $label = 'Data Pengurus';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\FileUpload::make('photo')
                        ->label('')
                        ->directory('images/manager')
                        ->avatar()
                        ->maxSize(1024)
                        ->columnSpanFull()
                        ->alignCenter(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Pengurus')
                        ->required(),
                    Forms\Components\Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            1 => 'Laki-laki',
                            2 => 'Perempuan',
                        ])
                        ->native(false)
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->label('No. HP / WA')
                        ->numeric()
                        ->required(),
                    Forms\Components\Select::make('data_item_position_id')
                        ->label('Jabatan')
                        ->relationship('position', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengurus')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataManagers::route('/'),
            'create' => Pages\CreateDataManager::route('/create'),
            'edit' => Pages\EditDataManager::route('/{record}/edit'),
        ];
    }
}
