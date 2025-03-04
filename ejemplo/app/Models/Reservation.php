<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'user_id',
        'reservation_datetime',
        'duration',
        'guests',
        'notes'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createReservation(array $data)
    {
        // Validar los datos antes de insertar en la base de datos
        $validated = Validator::make($data, [
            'table_id' => 'required|exists:tables,id',
            'user_id' => 'required|exists:users,id',
            'reservation_datetime' => 'required|date',
            'duration' => 'required|integer|min:30',
            'guests' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ])->validate();

        // Comprobar disponibilidad antes de reservar
        $availableTables = Table::availableTables(
            $validated['guests'],
            $validated['reservation_datetime'],
            $validated['duration']
        );

        if (!$availableTables->contains('id', $validated['table_id'])) {
            throw ValidationException::withMessages(['table_id' => 'La mesa seleccionada no está disponible.']);
        }

        // Crear la reserva
        return self::create($validated);
    }

}

