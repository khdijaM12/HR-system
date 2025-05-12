<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveTypeResource\Pages;
use App\Filament\Resources\LeaveTypeResource\RelationManagers;
use App\Models\LeaveType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class LeaveTypeResource extends Resource
{
    protected static ?string $model = LeaveType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('name')
    ->label('اسم الإجازة')
    ->required()
    ->options([
        'سنوية' => 'إجازة سنوية',
        'مرضية' => 'إجازة مرضية',
        'بدون راتب' => 'إجازة رسمية',
        
    ])
    ->searchable()
    ->native(false),


        Forms\Components\TextInput::make('days_allowed')
            ->label('عدد الأيام المسموحة')
            ->numeric()
            ->placeholder('اتركه فارغ إذا كانت غير محددة'),

        Forms\Components\Toggle::make('deduct_from_salary')
            ->label('يخصم من الراتب؟'),

        Forms\Components\Toggle::make('requires_approval')
            ->label('يتطلب موافقة؟')
            ->default(true),

        
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListLeaveTypes::route('/'),
            'create' => Pages\CreateLeaveType::route('/create'),
            'edit' => Pages\EditLeaveType::route('/{record}/edit'),
        ];
    }
}




