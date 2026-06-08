{{-- resources/views/tasks/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Editar tarea</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 shadow rounded">

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Título</label>
                <input type="text" name="title"
                       value="{{ old('title', $task->title) }}"
                       class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Descripción</label>
                <textarea name="description"
                          class="w-full border p-2 rounded">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label>
                    <input type="checkbox" name="completed" value="1"
                        {{ $task->completed ? 'checked' : '' }}>
                    Completada
                </label>
            </div>

            <button class="bg-blue-600 text-text-black px-4 py-2 rounded">
                Actualizar
            </button>
        </form>
    </div>
</x-app-layout>