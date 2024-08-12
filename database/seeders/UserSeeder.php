<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $teknisiRole = Role::firstOrCreate(['name' => 'Teknisi']);

        // Create permissions for all resources
        $permissions = [
            'device',
            'location',
            'measurement',
            'station',
            'user',
            'train::profile'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => "view_$permission"]);
            Permission::firstOrCreate(['name' => "view_any_$permission"]);
            Permission::firstOrCreate(['name' => "create_$permission"]);
            Permission::firstOrCreate(['name' => "update_$permission"]);
            Permission::firstOrCreate(['name' => "restore_$permission"]);
            Permission::firstOrCreate(['name' => "restore_any_$permission"]);
            Permission::firstOrCreate(['name' => "replicate_$permission"]);
            Permission::firstOrCreate(['name' => "reorder_$permission"]);
            Permission::firstOrCreate(['name' => "delete_$permission"]);
            Permission::firstOrCreate(['name' => "delete_any_$permission"]);
            Permission::firstOrCreate(['name' => "force_delete_$permission"]);
            Permission::firstOrCreate(['name' => "force_delete_any_$permission"]);
        }

        Permission::firstOrCreate(['name' => "view_role"]);
        Permission::firstOrCreate(['name' => "view_any_role"]);
        Permission::firstOrCreate(['name' => "create_role"]);
        Permission::firstOrCreate(['name' => "update_role"]);
        Permission::firstOrCreate(['name' => "delete_role"]);
        Permission::firstOrCreate(['name' => "delete_any_role"]);

        // Assign all permissions to super_admin
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to teknisi
        $teknisiRole->givePermissionTo(['view_device', 'view_measurement', 'view_any_device', 'view_any_measurement', 'view_any_train::profile']);

        // Create users and assign roles
        if (!User::where('email', 'superadmin@mail.com')->exists()) {
            $superAdmin = User::create([
                'name' => 'super_admin',
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('superadmin123')
            ]);
            $superAdmin->assignRole($superAdminRole);
        }

        if (!User::where('email', 'teknisi@mail.com')->exists()) {
            $teknisi = User::create([
                'name' => 'Teknisi',
                'email' => 'teknisi@mail.com',
                'password' => Hash::make('teknisi123')
            ]);
            $teknisi->assignRole($teknisiRole);
        }
    }
}
