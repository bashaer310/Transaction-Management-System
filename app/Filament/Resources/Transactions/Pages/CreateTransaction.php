<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = Filament::auth()->user();

        if (!$user?->hasRole('Admin')) {
            $data['department_id'] = $user->department_id;
        }
        $data['created_by'] = $user->id;
        return $data;
    }
}
