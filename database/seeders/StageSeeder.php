<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed the stages table with some data
        Stage::updateOrCreate(
            ['title' => 'GRANDFINAL'],
            ['description' => '-']
        );
    }
}
