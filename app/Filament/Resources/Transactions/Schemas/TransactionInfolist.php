<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transaction_number')
                    ->label('رقم المعاملة'),

                TextEntry::make('subject')
                    ->label('الموضوع'),

                TextEntry::make('sourceEntity.name')
                    ->label('الجهة الصادرة'),

                TextEntry::make('receivingDepartment.name')
                    ->label('القسم المستلم'),

                TextEntry::make('status')
                    ->label('الحالة')
                    ->badge(),

                TextEntry::make('creator.name')
                    ->label('أنشئت بواسطة'),

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
