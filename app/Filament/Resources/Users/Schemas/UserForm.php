<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserStatus;
use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label('التحقق من البريد الإلكتروني'),
                TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->required(),
                Select::make('department_id')
                    ->label('القسم')
                    ->relationship('department', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status')
                    ->label('الحالة')
                    ->options(UserStatus::class)
                    ->default('active')
                    ->required(),
                Select::make('roles')
                    ->label('الدور')
                    ->relationship('roles', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->multiple()
            ]);
    }
}
