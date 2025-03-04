<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Table extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'table_id',
        'user_id',
        'seats',
        'reservation_datetime',
        'duration',
        'guests',
        'notes'
    ];

    /**
     * Relación con localización
     */
    public function localization()
    {
        return $this->belongsTo(Localization::class);
    }

    /**
     * Relación con reservas
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Valida los datos de la reserva
     *
     * @param array $data Datos de la reserva
     * @return array Datos validados
     * @throws ValidationException Si la validación falla
     */
    public static function validate(array $data)
    {
        $rules = [
            'table_id' => 'required|exists:tables,id',
            'user_id' => 'required|exists:users,id',
            'seats' => 'required',
            'reservation_datetime' => 'required',
            'duration' => 'required', 
            'guests' => 'required',
            'notes' => 'nullable|string',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    /**
     * Obtiene las mesas disponibles para una fecha/hora y duración específicas
     *
     * @param int $guests Número de invitados (para filtrar por capacidad)
     * @param Carbon|string|null $dateTime La fecha y hora para verificar disponibilidad
     * @param int $duration Duración de la reserva en minutos
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function availableTables($guests = 1, $dateTime = null, $duration = 90)
{
    if ($dateTime === null) {
        $dateTime = Carbon::now();
    } elseif (!$dateTime instanceof Carbon) {
        $dateTime = Carbon::parse($dateTime);
    }
    $duration = (int) $duration; // Convierte a entero

    $endTime = (clone $dateTime)->addMinutes($duration);
   

    return self::leftJoin('reservations', function ($join) use ($dateTime, $endTime) {
            $join->on('tables.id', '=', 'reservations.table_id')
                ->where(function ($query) use ($dateTime, $endTime) {
                    $query->whereBetween('reservations.reservation_datetime', [$dateTime, $endTime])
                          ->orWhereRaw("DATE_ADD(reservations.reservation_datetime, INTERVAL reservations.duration MINUTE) > ?", [$dateTime]);
                });
        })
        ->whereNull('reservations.table_id') // Solo mesas que NO tengan reservas en el horario
        ->where('tables.seats', '>=', $guests)
        ->orderBy('tables.seats')
        ->select('tables.*') // Asegura que solo se seleccionen las mesas
        ->get();
}

}