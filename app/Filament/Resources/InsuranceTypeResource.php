<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceTypeResource\Pages;
use App\Filament\Resources\InsuranceTypeResource\RelationManagers;
use App\Models\InsuranceType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceTypeResource extends Resource
{
    protected static ?string $model = InsuranceType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->maxLength(500),

                 Forms\Components\Select::make('insurance_type_id')
                ->relationship('insuranceType', 'name')
                ->required(),

        ]);
}

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('description')->limit(50),
        ])
        ->filters([
            Tables\Filters\TrashedFilter::make(), 
        ])
        ->actions([
    Tables\Actions\ViewAction::make(),           // عرض
    Tables\Actions\EditAction::make(),           // تعديل
    Tables\Actions\DeleteAction::make(),         // حذف (نقل لـ trash)
    Tables\Actions\RestoreAction::make(),        // استرجاع من trash
    Tables\Actions\ForceDeleteAction::make(),    // حذف نهائي
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
            'index' => Pages\ListInsuranceTypes::route('/'),
            'create' => Pages\CreateInsuranceType::route('/create'),
            'edit' => Pages\EditInsuranceType::route('/{record}/edit'),
        ];
    }
}
