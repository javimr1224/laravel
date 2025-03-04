<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservas
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <!-- Pasamos las reservas al componente -->
        <x-reservations.index-card :reservations="$reservations"/>
        @foreach ($reservations as $reservation)
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li class="px-2 py-3 sm:py-4 bg-blue-100">
                            <div class="flex items-center">
                                <!-- Imagen del usuario -->
                                <div class="shrink-0 min-w-64">
                                    <p>{{ $reservation->user->name }}</p>
                                </div>
                                <!-- Información de la reserva -->
                                <div class="flex-1 ml-4 min-w-64">
                                    <p class="text-sm text-gray-500 truncate">
                                        Mesa: {{ $reservation->table->name }}<br>
                                        Inicio: {{ \Carbon\Carbon::parse($reservation->start)->format('d/m/Y H:i') }}<br>
                                        Fin: {{ \Carbon\Carbon::parse($reservation->end)->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                <!-- Número de comensales -->
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    {{ $reservation->guests }} Invitados
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        @endforeach

        <!-- Botón para crear una nueva reserva -->
        <a href="{{ route('reservation.create') }}" class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Reservar
        </a>
    </div>
</x-app-layout>
