<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localization;

class LocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localizations = [
            [
                'name' => 'Salón 1',
                'description' => 'Área principal del restaurante.'
            ],
            [
                'name' => 'Salón 2',
                'description' => 'Segunda área para clientes.'
            ],
            [
                'name' => 'Exterior 1',
                'description' => 'Zona al aire libre para disfrutar del clima.'
            ],
        ];

        foreach ($localizations as $localization) {
            Localization::create($localization);
        }
    }
}
