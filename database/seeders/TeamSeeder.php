<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeding Teams Table
        $teams = [
            [
                'name' => 'Manchester United',
                'score' => 100,
                'logo' => 'manchester-united.png',
            ],
            [
                'name' => 'Chelsea FC',
                'score' => 100,
                'logo' => 'chelsea-fc.png',
            ],
            [
                'name' => 'Al-Nassr FC',
                'score' => 100,
                'logo' => 'al-nassr-fc.png',
            ],
            [
                'name' => 'Real Madrid CF',
                'score' => 100,
                'logo' => 'real-madrid-cf.png',
            ],
            [
                'name' => 'Persebaya Surabaya',
                'score' => 100,
                'logo' => 'persebaya.png',
            ],
        ];

        foreach ($teams as $team) {
            Team::updateOrCreate(
                ['name' => $team['name']],
                [
                    'score' => $team['score'],
                    'logo' => $team['logo'],
                ]
            );
        }
    }
}
