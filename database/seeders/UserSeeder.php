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
                'name' => 'Mulyono',
                'email' => 'mulyono@gmail.com',
                'password' => bcrypt('mulyono123'),
                'role' => 'user',
                'photo_profile' => null,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
