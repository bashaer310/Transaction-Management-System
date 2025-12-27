<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Remove cach */
        app(PermissionRegistrar::class)->forgetCachedPermissions();


        /* Create Rols */
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $user = Role::firstOrCreate(['name' => 'User']);

        /* Create Permissions */
        $permissions = [
            // Users
            'create-user',
            'edit-user',
            'delete-user',
            'view-user',

            // Departments
            'create-department',
            'edit-department',
            'delete-department',
            'view-department',

            // Entities
            'create-entity',
            'edit-entity',
            'delete-entity',
            'view-entity',

            // Transactions
            'create-transaction',
            'edit-transaction',
            'delete-transaction',
            'view-transaction',

            // Notes
            'create-note',
            'edit-note',
            'delete-note',
            'view-note',

            // Attachments
            'create-attachment',
            'edit-attachment',
            'delete-attachment',
            'view-attachment',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        /* link Permission with role */
        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'view-user',
            'create-transaction',
            'edit-transaction',
            'view-transaction',
            'create-note',
            'edit-note',
            'view-note',
            'create-attachment',
            'edit-attachment',
            'view-attachment',
            'view-department',
            'view-entity',
        ]);

        $user->givePermissionTo([
            'view-transaction',
            'create-note',
            'view-note',
            'create-attachment',
            'view-attachment',
        ]);
    }
}
