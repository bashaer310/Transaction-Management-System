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


        /* Create Roles */
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $employee = Role::firstOrCreate(['name' => 'Employee']);

        /* Create Permissions */
        $permissions = [
            // System / Panel 
            'access-admin-panel',
            'assign-role',
            'view-role',

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

            // Report
            'create-report'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        /* link Permission with role */
        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'edit-user',
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
            'create-report',
            'access-admin-panel',
        ]);

        $employee->givePermissionTo([
            'edit-user',
            'view-transaction',
            'create-note',
            'view-note',
            'create-attachment',
            'view-attachment',
        ]);
    }
}
