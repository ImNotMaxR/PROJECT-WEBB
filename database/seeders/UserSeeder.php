<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('Maskgem12'),
                'role' => 'superadmin',
                'foto' => null,
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'kelas' => null,
                'tanggal_lahir' => '1980-01-01',
                'alamat' => 'Jakarta',
                'no_telepon' => '081234567890'
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Maskgem12'),
                'role' => 'admin',
                'foto' => null,
                'first_name' => 'Admin',
                'last_name' => 'User',
                'kelas' => null,
                'tanggal_lahir' => '1990-05-15',
                'alamat' => 'Bandung',
                'no_telepon' => '082345678901'
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('Maskgem12'),
                'role' => 'user',
                'foto' => null,
                'first_name' => 'Regular',
                'last_name' => 'User',
                'kelas' => null,
                'tanggal_lahir' => '2000-08-20',
                'alamat' => 'Surabaya',
                'no_telepon' => '083456789012'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
