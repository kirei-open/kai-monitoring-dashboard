<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Create roles
    $superAdminRole = Role::create(['name' => 'super_admin']);
    $adminRole = Role::create(['name' => 'Admin']);
    $teknisiRole = Role::create(['name' => 'Teknisi']);

    // Create users and assign roles
    $superAdmin = User::create([
        'name' => 'super_admin',
        'email' => 'superadmin@kai.com',
        'password' => Hash::make('superadmin123')
    ]);
    $superAdmin->assignRole($superAdminRole);

    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@kai.com',
        'password' => Hash::make('admin123')
    ]);
    $admin->assignRole($adminRole);

    $teknisi = User::create([
        'name' => 'Teknisi',
        'email' => 'teknisi@kai.com',
        'password' => Hash::make('teknisi123')
    ]);
    $teknisi->assignRole($teknisiRole);
}
}
