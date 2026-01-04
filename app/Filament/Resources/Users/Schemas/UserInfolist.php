<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('الاسم'),
                TextEntry::make('email')
                    ->label('البريد الإلكتروني'),
                TextEntry::make('email_verified_at')
                    ->label('التحقق من البريد الإلكتروني')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('department.name')
                    ->label('القسم'),
                TextEntry::make('status')
                    ->label('الحالة')
                    ->badge(),
                TextEntry::make('roles.name')
                    ->label('الدور'),
                TextEntry::make('created_at')
                    ->label('تاريخ الانشاء')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('آخر التحديث')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
