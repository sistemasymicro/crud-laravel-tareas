<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white-800">
                Mis Tareas
            </h2>

            <a href="{{ route('tasks.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nueva tarea
            </a>        
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-6">
        
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded">
            @forelse($tasks as $task)
                <div class="border-b p-4 flex justify-between items-center">

                 <a href="{{ route('tasks.show', $task) }}"
                    class="text-green-600 hover:underline">
                    Ver
                </a>
                    <div>
                        <h3 class="font-bold text-lg">
                            {{ $task->title }}
                        </h3>

                        <p class="text-gray-600 text-sm">
                            {{ $task->description }}
                        </p>

                        <span class="text-xs mt-1 inline-block 
                            {{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
                            {{ $task->completed ? '✔ Completada' : 'Pendiente' }}
                        </span>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="p-4 text-gray-500 text-center">
                    No tienes tareas aún.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>