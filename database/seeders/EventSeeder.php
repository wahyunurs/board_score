<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::updateOrCreate(
            ['short_title' => 'KCC'],
            [
                'long_title' => 'Kompetisi Cerdas Cermat',
                'theme' => 'Mewujudkan Generasi Emas Indonesia Melalui Prestasi dan Inovasi',
                'level' => 'Nasional',
                'date' => '2026-01-31',
                'location' => 'H7 Auditorium, Universitas Dian Nuswantoro, Semarang',
                'description' => 'Kompetisi tingkat nasional untuk memilih pelajar berprestasi dari seluruh Indonesia.',
            ]
        );
    }
}
