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
                    ->required(),
                TextInput::make('subject')
                    ->required(),
                Select::make('source_entity_id')
                    ->relationship('sourceEntity', 'name')
                    ->required(),
                Select::make('receiving_department_id')
                    ->relationship('receivingDepartment', 'name')
                    ->required()
                    ->disabled(
                        fn() =>
                        !Filament::auth()->user()?->hasRole('admin')
                    )
                    ->default(
                        fn() =>
                        Filament::auth()->user()?->department_id
                    )
                    ->dehydrated(true),
                Select::make('status')
                    ->options(TransactionStatus::class)
                    ->default('pending')
                    ->required(),
            ]);
    }
}
