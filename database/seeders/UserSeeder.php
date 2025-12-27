<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        /* retrieve roles */
        $adminRole   = Role::where('name', 'Admin')->firstOrFail();
        $managerRole = Role::where('name', 'Manager')->firstOrFail();
        $employeeRole    = Role::where('name', 'Employee')->firstOrFail();

        /* Create admin  */
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'status' => UserStatus::ACTIVE,
                'department_id' => 1,
            ]
        );

        /* Assign role */
        $admin->syncRoles($adminRole);

        
    }
}
