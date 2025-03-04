<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Table;
use Illuminate\Support\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Obtenemos el primer usuario de prueba
        $user = User::first();

        // Obtenemos una mesa (puedes ajustar la selección si deseas reservar mesas distintas)
        $table = Table::first();

        // Primera reserva: para el día siguiente a las 20:00 con una duración de 90 minutos
        Reservation::create([
            'table_id'             => $table->id,
            'user_id'              => $user->id,
            'reservation_datetime' => Carbon::now()->addDay()->setTime(20, 0),
            'duration'             => 90,
            'guests'               => 2,
            'notes'                => 'Primera reserva de prueba para cena',
        ]);

        // Segunda reserva: para dentro de una semana a las 21:00 con una duración de 120 minutos
        Reservation::create([
            'table_id'             => $table->id,
            'user_id'              => $user->id,
            'reservation_datetime' => Carbon::now()->addWeek()->setTime(21, 0),
            'duration'             => 120,
            'guests'               => 2,
            'notes'                => 'Segunda reserva de prueba para evento especial',
        ]);
    }
    
}
