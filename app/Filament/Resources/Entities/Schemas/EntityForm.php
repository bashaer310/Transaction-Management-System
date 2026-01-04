<?php

namespace App\Filament\Resources\Entities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EntityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('name')
                ->label('الاسم')
                ->required(),

            TextInput::make('contact_info')
                ->label('معلومات التواصل')
                ->required(),

        ]);
    }
}
