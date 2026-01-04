<?php

namespace App\Filament\Resources\Transactions\Schemas;

use App\Enums\TransactionStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Facades\Filament;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('transaction_number')
                ->label('رقم المعاملة')
                ->required(),

            TextInput::make('subject')
                ->label('الموضوع')
                ->required(),

            Select::make('source_entity_id')
                ->label('الجهة الصادرة')
                ->relationship('sourceEntity', 'name')
                ->required(),

            Select::make('receiving_department_id')
                ->label('القسم المستلم')
                ->relationship('receivingDepartment', 'name')
                ->required()
                ->disabled(
                    fn() =>
                    !Filament::auth()->user()?->hasRole('Admin')
                )
                ->default(
                    fn() =>
                    Filament::auth()->user()?->department_id
                )
                ->dehydrated(true),

            Select::make('status')
                ->label('حالة المعاملة')
                ->options(TransactionStatus::class)
                ->default('pending')
                ->required(),

        ]);
    }
}
