<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;


class ReservationController extends Controller
{
    //
    /**
     * Muestra la lista de reservas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //TO DO: Completa el código para obtener $reservations.
        $reservations = Reservation::all(); 
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Muestra el formulario para crear una nueva reserva.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Almacena una nueva reserva en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Obtener usuario autenticado
            $userId = Auth::guard()->user()->id;
            if (!$userId) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }

            // Buscar una mesa disponible automáticamente
            $availableTable = Table::availableTables($request->guests, $request->reservation_datetime, $request->duration)->first();

            if (!$availableTable) {
                return response()->json(['error' => 'No hay mesas disponibles'], 422);
            }

            $request->merge([
                'duration' => (int) $request->duration, // Convierte a número
            ]);

            // Crear la reserva con el usuario autenticado y la mesa encontrada
            $reservation = Reservation::create([
                'table_id' => $availableTable->id,
                'user_id' => $userId,
                'reservation_datetime' => $request->reservation_datetime,
                'duration' => $request->duration,
                'guests' => $request->guests,
                'notes' => $request->notes
            ]);

            return response()->json(['message' => 'Reserva creada con éxito', 'reservation' => $reservation], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

}
