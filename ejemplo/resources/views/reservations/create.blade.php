<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Reserva
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white p-6 rounded-lg shadow-sm">

            {{--TODO:  Mostrar mensaje de error si no hay mesa disponible --}}
            
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <!-- Fecha y Hora de Reserva -->
                <div class="mb-4">
                    <label for="reservation_datetime" class="block text-gray-700 font-bold mb-2">Fecha y Hora:</label>
                    <input type="datetime-local" name="reservation_datetime" id="reservation_datetime"
                        value="{{ old('reservation_datetime') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('reservation_datetime')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Duración (en minutos) -->
                <div class="mb-4">
                    <label for="duration" class="block text-gray-700 font-bold mb-2">Duración (minutos):</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration', 90) }}"
                        class="w-full border border-gray-300 p-2 rounded">
                    @error('duration')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Número de Invitados -->
                <div class="mb-4">
                    <label for="guests" class="block text-gray-700 font-bold mb-2">Número de Invitados:</label>
                    <input type="number" name="guests" id="guests" value="{{ old('guests') }}"
                        class="w-full border border-gray-300 p-2 rounded">
                    @error('guests')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Notas Adicionales -->
                <div class="mb-4">
                    <label for="notes" class="block text-gray-700 font-bold mb-2">Notas Adicionales:</label>
                    <textarea name="notes" id="notes" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('notes') }}</textarea>
                    @error('notes')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botón de Envío -->
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Crear Reserva
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
