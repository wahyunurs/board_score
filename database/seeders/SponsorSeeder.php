<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            [
                'name' => 'Bank Jateng',
                'logo' => 'logo-bank-jateng.jpg',
                'description' => '-',
            ],
            [
                'name' => 'RuangGuru',
                'logo' => 'logo-ruang-guru.jpg',
                'description' => '-',
            ],
            [
                'name' => 'Virgin',
                'logo' => 'logo-virgin.png',
                'description' => '-',
            ]
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::updateOrCreate(
                ['name' => $sponsor['name']],
                [
                    'logo' => $sponsor['logo'],
                    'description' => $sponsor['description'],
                ]
            );
        }
    }
}
