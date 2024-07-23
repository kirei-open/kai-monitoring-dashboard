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
            'Device',
            'Location',
            'Measurement',
            'Station',
            'User'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => "view $permission"]);
            Permission::firstOrCreate(['name' => "create $permission"]);
            Permission::firstOrCreate(['name' => "update $permission"]);
            Permission::firstOrCreate(['name' => "delete $permission"]);
        }

        // Assign all permissions to super_admin
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to teknisi
        $teknisiRole->givePermissionTo(['view Device', 'view Measurement']);

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
