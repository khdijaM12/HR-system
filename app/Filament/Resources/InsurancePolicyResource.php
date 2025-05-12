<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsurancePolicyResource\Pages;
use App\Filament\Resources\InsurancePolicyResource\RelationManagers;
use App\Models\InsurancePolicy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class InsurancePolicyResource extends Resource
{
    protected static ?string $model = InsurancePolicy::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Insurance Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('insurance_type_id')
                    ->label('Insurance Type')
                    ->relationship('insuranceType', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('coverage_amount')
                    ->label('Coverage Amount')
                    ->numeric()
                    ->required(),

                Forms\Components\DatePicker::make('start_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('insuranceType.name')->label('Type')->sortable(),
                Tables\Columns\TextColumn::make('coverage_amount')->label('Coverage')->sortable(),
                Tables\Columns\TextColumn::make('start_date')->date(),
                Tables\Columns\TextColumn::make('end_date')->date(),
                Tables\Columns\TextColumn::make('description')->limit(30),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInsurancePolicies::route('/'),
            'create' => Pages\CreateInsurancePolicy::route('/create'),
            'edit' => Pages\EditInsurancePolicy::route('/{record}/edit'),
            
        ];
    }
    
}