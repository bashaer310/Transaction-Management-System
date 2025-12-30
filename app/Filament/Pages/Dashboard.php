<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationLabel = 'Dashboard';

    protected string $view = 'filament.pages.dashboard';

    /*public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->can('view-dashboard');
    }*/
}
