<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataParentResource\Pages;
use App\Filament\Resources\DataParentResource\RelationManagers;
use App\Models\DataParent;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class DataParentResource extends Resource
{
    protected static ?string $model = DataParent::class;

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Database';
    protected static ?string $navigationLabel = 'Data Orangtua';
    protected static ?string $label = 'Data Orangtua';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    FileUpload::make('photo')
                        ->label('')
                        ->directory('images/parent')
                        ->avatar()
                        ->maxSize(1024)
                        ->columnSpanFull()
                        ->alignCenter(),
                    TextInput::make('name')
                        ->label('Nama Orangtua')
                        ->required(),
                    Select::make('gender')
                        ->Label('Jenis Kelamin')
                        ->options([
                            1 => 'Laki-laki',
                            2 => 'Perempuan',
                        ])
                        ->native(false)
                        ->required(),
                    TextInput::make('phone')
                        ->label('No. HP / WA')
                        ->numeric()
                        ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('')
                    ->circular()
                    ->alignCenter(),
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Laki-laki' : 'Perempuan')
                    ->badge(),
                TextColumn::make('phone')
                    ->label('No. HP / Wa')
                    ->copyable()
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->label('Pilih Jenis Kelamin')
                    ->options([
                        1 => 'Laki-laki',
                        2 => 'Perempuan',
                    ])
                    ->native(false)
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
            'index' => Pages\ListDataParents::route('/'),
            'create' => Pages\CreateDataParent::route('/create'),
            'edit' => Pages\EditDataParent::route('/{record}/edit'),
        ];
    }
}
