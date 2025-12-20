<?php

namespace Database\Seeders;

use App\Models\MediaPartner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeding Media Partners Table
        $mediaPartners = [
            [
                'name' => 'Partner Event',
                'logo' => 'logo-partner-event.png',
                'description' => '-',
            ],
            [
                'name' => 'Pojok Event',
                'logo' => 'logo-pojok-event.jpeg',
                'description' => '-',
            ],
            [
                'name' => 'Seputar Info ID',
                'logo' => 'logo-seputar-info-id.jpg',
                'description' => '-',
            ],
        ];

        foreach ($mediaPartners as $mediaPartner) {
            MediaPartner::updateOrCreate(
                ['name' => $mediaPartner['name']],
                [
                    'logo' => $mediaPartner['logo'],
                    'description' => $mediaPartner['description'],
                ]
            );
        }
    }
}
