<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeding Headers Table
        $headers = [
            [
                'name' => 'Universitas Dian Nuswantoro',
                'logo' => 'logo-udinus.png',
                'description' => '-',
            ],
            [
                'name' => 'Unggul',
                'logo' => 'logo-unggul.png',
                'description' => '-',
            ],
            [
                'name' => 'QS Asia',
                'logo' => 'logo-qs-asia.png',
                'description' => '-',
            ],
            [
                'name' => 'DPM KM UDINUS',
                'logo' => 'logo-dpm.png',
                'description' => '-',
            ],
            [
                'name' => 'Parlemen',
                'logo' => 'logo-parlemen.png',
                'description' => '-',
            ],
            [
                'name' => 'Dinus Fest 2026',
                'logo' => 'logo-dinusfest.png',
                'description' => '-',
            ],
            [
                'name' => 'Kompetisi Cerdas Cermat',
                'logo' => 'logo-kcc.png',
                'description' => '-',
            ],
        ];

        foreach ($headers as $header) {
            Header::updateOrCreate(
                ['name' => $header['name']],
                [
                    'logo' => $header['logo'],
                    'description' => $header['description'],
                ]
            );
        }
    }
}
