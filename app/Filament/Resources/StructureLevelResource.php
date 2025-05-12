<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StructureLevelResource\Pages;
use App\Filament\Resources\StructureLevelResource\RelationManagers;
use App\Models\StructureLevel;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StructureLevelResource extends Resource
{
    protected static ?string $model = StructureLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
          return $form->schema([
        TextInput::make('name')
            ->label('اسم المستوى')
            ->required(),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم')->searchable(),

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
            'index' => Pages\ListStructureLevels::route('/'),
            'create' => Pages\CreateStructureLevel::route('/create'),
            'edit' => Pages\EditStructureLevel::route('/{record}/edit'),
        ];
    }
}
