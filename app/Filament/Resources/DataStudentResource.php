<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataStudentResource\Pages;
use App\Filament\Resources\DataStudentResource\RelationManagers;
use App\Models\DataStudent;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataStudentResource extends Resource
{
    protected static ?string $model = DataStudent::class;

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Database';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $label = 'Data Siswa';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\FileUpload::make('photo')
                        ->label('')
                        ->directory('images/student')
                        ->avatar()
                        ->maxSize(1024)
                        ->columnSpanFull()
                        ->alignCenter(),
                    Select::make('data_parent_id')
                        ->label('Orangtua')
                        ->relationship('parent', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Siswa')
                        ->required(),
                    Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            1 => 'Laki-laki',
                            2 => 'Perempuan',
                        ])
                        ->native(false)
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
                    ->label('Nama Siswa')
                    ->description(fn (DataStudent $record) => $record->parent ? 'Anak Dari ' . $record->parent->name : 'Tidak ada data orangtua'),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Laki-laki' : 'Perempuan')
                    ->badge()
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        1 => 'Laki-laki',
                        2 => 'Perempuan',
                    ])
                    ->native(false)
                    ->label('Jenis Kelamin'),
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
            'index' => Pages\ListDataStudents::route('/'),
            'create' => Pages\CreateDataStudent::route('/create'),
            'edit' => Pages\EditDataStudent::route('/{record}/edit'),
        ];
    }
}
