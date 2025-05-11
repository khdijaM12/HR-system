<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobStructureResource\Pages;
use App\Filament\Resources\JobStructureResource\RelationManagers;
use App\Models\JobStructure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobStructureResource extends Resource
{
    protected static ?string $model = JobStructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('role_id')
                ->relationship('role', 'name')
                ->label('الدور الوظيفي')
                ->required(),

            Select::make('job_title_id')
                ->relationship('jobTitle', 'name')
                ->label('المسمى الوظيفي')
                ->required(),

            Select::make('level_id')
                ->relationship('level', 'name')
                ->label('المستوى الوظيفي')
                ->required(),

            TextInput::make('base_salary')
                ->numeric()
                ->label('الراتب الأساسي')
                ->required(),

            Textarea::make('description')
                ->label('الوصف')
                ->rows(3)
                ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('role.name')->label('الدور'),
                TextColumn::make('jobTitle.name')->label('المسمى الوظيفي'),
                TextColumn::make('level.name')->label('المستوى'),
                TextColumn::make('base_salary')->label('الراتب'),
                TextColumn::make('description')->label('الوصف'),
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
            'index' => Pages\ListJobStructures::route('/'),
            'create' => Pages\CreateJobStructure::route('/create'),
            'edit' => Pages\EditJobStructure::route('/{record}/edit'),
        ];
    }
}
