<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyStructureResource\Pages;
use App\Filament\Resources\CompanyStructureResource\RelationManagers;
use App\Models\CompanyStructure;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompanyStructureResource extends Resource
{
    protected static ?string $model = CompanyStructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('الاسم')
                ->required(),

                Select::make('structure_level_id')
                ->label('نوع الوحدة')
                ->relationship('structureLevel','name')
                ->required(),

                Select::make('parent_id')
                ->label('تابع ل')
                ->options(function () {
                return CompanyStructure::pluck('name', 'id');
            })
                ->searchable()
                ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم')->searchable(),
                TextColumn::make('structureLevel.name')->label('نوع الوحدة'),
                TextColumn::make('parent.name')->label('تابع لـ'),
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
            'index' => Pages\ListCompanyStructures::route('/'),
            'create' => Pages\CreateCompanyStructure::route('/create'),
            'edit' => Pages\EditCompanyStructure::route('/{record}/edit'),
        ];
    }
}
