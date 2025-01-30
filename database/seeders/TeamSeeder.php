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
                'name' => 'Tim Merah',
                'score' => 100,
                'logo' => null,
            ],
            [
                'name' => 'Tim Biru',
                'score' => 100,
                'logo' => null,
            ],
            [
                'name' => 'Tim Hijau',
                'score' => 100,
                'logo' => null,
            ],
            [
                'name' => 'Tim Kuning',
                'score' => 100,
                'logo' => null,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
