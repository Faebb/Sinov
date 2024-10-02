<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NovedadResource\Pages;
use App\Filament\Resources\NovedadResource\RelationManagers;
use App\Models\Novedad;
use App\Models\TipoNovedad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NovedadResource extends Resource
{
    protected static ?string $model = Novedad::class;
    protected static ?string $tenantRelationshipName = 'novedades';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->rows(10)
                    ->cols(20)
                    ->maxLength(255)
                    ->columnSpan([
                        'sm' => 1,
                        'xl' => 1,
                        '2xl' => 1,
                    ]),
                Forms\Components\DatePicker::make('fecha')
                    ->default(now())
                    ->required(),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('longitud')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100),
                Forms\Components\TextInput::make('latitud')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100),
                Forms\Components\Select::make('afiliado_id')
                    ->relationship('afiliado', 'name')
                    ->required()
                    ->label('Afiliado'),
                Forms\Components\Select::make('tpnovedades_id')
                ->label('Tipo de Novedad')
                ->options(TipoNovedad::all()->pluck('titulo', 'id'))
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->label('longitud')
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->label('longitud')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cliente_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('afiliado_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tpnovedades_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListNovedads::route('/'),
            'create' => Pages\CreateNovedad::route('/create'),
            'edit' => Pages\EditNovedad::route('/{record}/edit'),
        ];
    }
}
