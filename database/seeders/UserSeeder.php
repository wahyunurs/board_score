<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeding Users Table
        $users = [
            [
                'name' => 'DPM KM UDINUS',
                'email' => 'dpmkmudinus@gmail.com',
                'password' => bcrypt('dpmkmudinus123'),
                'role' => 'admin',
                'photo_profile' => null,
            ],
            [
                'name' => 'Kompetisi Cerdas Cermat',
                'email' => 'kcc@gmail.com',
                'password' => bcrypt('kcc123'),
                'role' => 'user',
                'photo_profile' => null,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'photo_profile' => $user['photo_profile'],
                ]
            );
        }
    }
}
