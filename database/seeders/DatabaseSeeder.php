<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TeamSeeder::class,
            StageSeeder::class,
            EventSeeder::class,
            SponsorSeeder::class,
            MediaPartnerSeeder::class,
            HeaderSeeder::class,
        ]);
    }
}
