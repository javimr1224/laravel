<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight m-4">¿Qué quieres hacer?</h3>
                <ul class="list-disc p-8 space-y-2">  
                    <li><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('localization.index')}}">Gestionar localizaciones</a></li>
                    <li><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('table.index')}}">Gestionar mesas</a></li>
                    <li><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('reservation.index')}}">Gestionar reservas</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
