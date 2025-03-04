<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localization;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos las localizaciones existentes
        $salon1   = Localization::where('name', 'Salón 1')->first();
        $salon2   = Localization::where('name', 'Salón 2')->first();
        $exterior1 = Localization::where('name', 'Exterior 1')->first();

        // Definir algunas mesas de ejemplo asociadas a las localizaciones
        $tables = [
            [
                'name'             => 'Mesa 1',
                'description'      => 'Mesa cerca de la ventana en Salón 1.',
                'seats'            => 4,
                'localization_id'  => $salon1->id,
            ],
            [
                'name'             => 'Mesa 2',
                'description'      => 'Mesa central en Salón 1.',
                'seats'            => 6,
                'localization_id'  => $salon1->id,
            ],
            [
                'name'             => 'Mesa 3',
                'description'      => 'Mesa en esquina en Salón 2.',
                'seats'            => 2,
                'localization_id'  => $salon2->id,
            ],
            [
                'name'             => 'Mesa 4',
                'description'      => 'Mesa exterior ideal para disfrutar del aire libre.',
                'seats'            => 4,
                'localization_id'  => $exterior1->id,
            ],
        ];

        // Crear las mesas en la base de datos
        foreach ($tables as $tableData) {
            Table::create($tableData);
        }
    }
}
