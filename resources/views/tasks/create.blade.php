{{-- resources/views/tasks/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Crear tarea</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 shadow rounded">

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <!-- Título -->
            <div class="mb-4">
                <label class="block font-medium">Título</label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded p-2">

                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label class="block font-medium">Descripción</label>
                <textarea name="description"
                          class="w-full border rounded p-2">{{ old('description') }}</textarea>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="completed" value="1">
                    Completada
                </label>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('tasks.index') }}" class="text-gray-600">
                    Cancelar
                </a>

                <button class="bg-blue-600 text-text-blue px-4 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>