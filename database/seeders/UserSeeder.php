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
        if (!User::where('email', 'superadmin@kai.co.id')->exists()) {
            $super_admin = User::create([
                'name' => 'super_admin',
                'email' => 'superadmin@kai.co.id',
                'password' => Hash::make('superadmin123')
            ]);
            $super_admin->assignRole('super_admin');
        }

        // Repeat the same check for other users

        if (!User::where('email', 'admin@kai.co.id')->exists()) {
            $Admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@kai.co.id',
                'password' => Hash::make('admin123')
            ]);
            $Admin->assignRole('Admin');
        }

        if (!User::where('email', 'teknisi@kai.co.id')->exists()) {
            $Teknisi = User::create([
                'name' => 'Teknisi',
                'email' => 'teknisi@kai.co.id',
                'password' => Hash::make('teknisi123')
            ]);
            $Teknisi->assignRole('Teknisi');
        }
    }
}
