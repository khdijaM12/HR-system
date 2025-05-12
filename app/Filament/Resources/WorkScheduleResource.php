<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkScheduleResource\Pages;
use App\Models\WorkSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WorkScheduleResource\RelationManagers\WorkScheduleDayRelationManager;

class WorkScheduleResource extends Resource
{
    protected static ?string $model = WorkSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
            ->label('اسم جدول الدوام')
            ->options([
                'دوام صباحي' => 'دوام صباحي',
                'دوام مسائي' => 'دوام مسائي',
                'دوام جزئي' => 'دوام جزئي',
            ])
            ->required()
            


                
            ]);
    }

    
public static function table(Table $table): Table
{
return $table
->columns([
Tables\Columns\TextColumn::make('name')->label('الاسم'),

]);

    }

    public static function getRelations(): array
{
    return [
        WorkScheduleDayRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkSchedules::route('/'),
            'create' => Pages\CreateWorkSchedule::route('/create'),
            'edit' => Pages\EditWorkSchedule::route('/{record}/edit'),
        ];
    }
}

