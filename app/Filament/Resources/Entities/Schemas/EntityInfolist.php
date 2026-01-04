<?php

namespace App\Filament\Resources\Entities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EntityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('الاسم'),

                TextEntry::make('contact_info')
                    ->label('معلومات التواصل'),

                TextEntry::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime()
                    ->placeholder('-'),

            ]);
    }
}
