<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* create entities */
        $entities = [
            [
                'name' => 'وزارة الداخلية',
                'contact_info' => 'info@moi.gov.sa | 920020405',
            ],
            [
                'name' => 'وزارة التعليم',
                'contact_info' => 'info@moe.gov.sa | 19996',
            ],
            [
                'name' => 'وزارة الصحة',
                'contact_info' => 'info@moh.gov.sa | 937',
            ],
            [
                'name' => 'هيئة الحكومة الرقمية',
                'contact_info' => 'contact@dga.gov.sa',
            ],
        ];

        foreach ($entities as $entity) {
            Entity::firstOrCreate(
                ['name' => $entity['name']],
                ['contact_info' => $entity['contact_info']]
            );
        }
    }
}
