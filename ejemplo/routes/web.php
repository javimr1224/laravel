<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Require __DIR__ . '/auth.php';


//Ruta para usuarios anónimos. La dejamos de momento sin alterar.
Route::get('/', function () {
    return view('welcome');
});

//Ruta para el acceso a las distintas partes de la aplicación, una vez se ha autenticado el usuario. No hay que modificar nada
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Rutas para la gestión del perfil de usuario. Las proporciona por defecto el starterkit LaravelBreeze, y no hay que tocarla
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Ruta para la gestión de localizaciones. La dejamos de momento sin alterar
Route::get('/localizations', function(){
    return 'Localization.index: TODO';
})->middleware(['auth', 'verified'])->name('localization.index');
//Ruta para la gestión de mesas. La dejamos de momento sin alterar
Route::get('/tables', function(){
    return 'Table.index: TODO';
} )->middleware(['auth', 'verified'])->name('table.index');

/**
 * 
 * TO DO: Crea aquí las rutas para la gestión de reservas. Debes habilitar 3:
 * La que conduzca al listado de todas las reservas
 * La que conduzca al formulario de creación de la reserva
 * La que conduzca al grabado de los datos proporcionados en el formulario de creación de la reserva
 * 
 * */

 Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
 Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservation.create');
 Route::post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');
