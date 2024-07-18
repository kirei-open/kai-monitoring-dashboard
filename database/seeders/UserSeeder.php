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
        if (!User::where('email', 'superadmin@mail.com')->exists()) {
            User::create([
                'name' => 'super_admin',
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('superadmin123')
            ]);
        }

        if (!User::where('email', 'teknisi@mail.com')->exists()) {
            User::create([
                'name' => 'Teknisi',
                'email' => 'teknisi@mail.com',
                'password' => Hash::make('teknisi123')
            ]);
        }

        
    }
}
