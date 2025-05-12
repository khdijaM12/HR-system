<?php

namespace App\Filament\Resources\WorkScheduleResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Form;
use Filament\Tables\Table;

class WorkScheduleDayRelationManager extends RelationManager
{
    protected static string $relationship = 'days'; // اسم العلاقة في الموديل

    protected static ?string $title = 'تفاصيل الجدول اليومي';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('day_of_week')
                ->label('اليوم')
                ->options([
                    'السبت' => 'السبت',
                    'الأحد' => 'الأحد',
                    'الاثنين' => 'الاثنين',
                    'الثلاثاء' => 'الثلاثاء',
                    'الأربعاء' => 'الأربعاء',
                    'الخميس' => 'الخميس',
                    'الجمعة' => 'الجمعة',
                ])
                ->required(),

            // Forms\Components\Select::make('work_schedule_type') // إضافة قائمة منسدلة لنوع الدوام
            //     ->label('نوع الدوام')
            //     ->options([
            //         'morning' => 'دوام صباحي',  // الخيار الأول
            //         'evening' => 'دوام مسائي',  // الخيار الثاني
            //         'part_time' => 'دوام جزئي', // الخيار الثالث
            //     ])
            //     ->required()
            //     ->placeholder('اختر نوع الدوام...'),

            Forms\Components\TimePicker::make('start_time')
                ->label('وقت البداية')
                ->seconds(false)
                ->nullable(),

            Forms\Components\TimePicker::make('end_time')
                ->label('وقت النهاية')
                ->seconds(false)
                ->nullable(),

            Forms\Components\TimePicker::make('break_start')
                ->label('بداية الاستراحة')
                ->seconds(false)
                ->nullable(),

            Forms\Components\TimePicker::make('break_end')
                ->label('نهاية الاستراحة')
                ->seconds(false)
                ->nullable(),

            Forms\Components\Toggle::make('is_day_off')
                ->label('هل هو يوم إجازة؟')
                ->default(false),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('day_of_week')->label('اليوم'),
            Tables\Columns\TextColumn::make('start_time')->label('بداية الدوام'),
            Tables\Columns\TextColumn::make('end_time')->label('نهاية الدوام'),
            Tables\Columns\TextColumn::make('break_start')->label('بداية الاستراحة'),
            Tables\Columns\TextColumn::make('break_end')->label('نهاية الاستراحة'),
            Tables\Columns\TextColumn::make('work_schedule_type')->label('نوع الدوام'), // عرض نوع الدوام في الجدول
            Tables\Columns\IconColumn::make('is_day_off')
                ->label('إجازة؟')
                ->boolean(),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
}
