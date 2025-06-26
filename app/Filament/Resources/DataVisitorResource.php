<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataVisitorResource\Pages;
use App\Filament\Resources\DataVisitorResource\RelationManagers;
use App\Models\DataVisitor;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataVisitorResource extends Resource
{
    protected static ?string $model = DataVisitor::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Pengunjung';
    protected static ?string $navigationLabel = 'Data Pengunjung';
    protected static ?string $label = 'Data Pengunjung';
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('visitor_type')
                    ->label('Jenis Pengunjung')
                    ->options([
                        '1' => 'Orang Tua',
                        '2' => 'Internal',
                        '3' => 'external',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('data_parent_id')
                    ->label('Orangtua')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pengunjung')
                    ->required(),
                Select::make('data_student_id')
                    ->label('Siswa')
                    ->relationship('student', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('data_manager_id')
                    ->label('Petugas')
                    ->relationship('manager', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('destinaition_name')
                    ->label('Tujuan')
                    ->required(),
                Forms\Components\TextInput::make('purpose')
                    ->label('Keperluan')
                    ->required(),
                Forms\Components\Toggle::make('is_overnight')
                    ->label('Menginap')
                    ->default(false),
                Select::make('data_item_building_id')
                    ->label('Bangunan')
                    ->relationship('building', 'name')
                    ->searchable()
                    ->preload(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visitor_type')
                    ->label('Jenis Pengunjung')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        '1' => 'Orang Tua',
                        '2' => 'Internal',
                        '3' => 'Eksternal',
                        default => 'Tidak Diketahui',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengunjung')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destinaition_name')
                    ->label('Tujuan'),
                Tables\Columns\TextColumn::make('purpose')
                    ->label('Keperluan'),
                Tables\Columns\TextColumn::make('is_overnight')
                    ->label('Menginap'),
                Tables\Columns\TextColumn::make('building.name')
                    ->label('Bangunan'),
            ])->filters([
                //
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
            'index' => Pages\ManageDataVisitors::route('/'),
        ];
    }
}
