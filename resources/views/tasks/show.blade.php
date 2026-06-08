

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detalle de tarea</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 shadow rounded">
        <h1 class="text-2xl font-bold mb-2">{{ $task->title }}</h1>

        <p class="text-gray-600 mb-4">{{ $task->description }}</p>

        <span class="{{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
            {{ $task->completed ? '✔ Completada' : '❌ Pendiente' }}
        </span>
    </div>
</x-app-layout>