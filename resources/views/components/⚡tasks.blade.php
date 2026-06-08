<?php

use Livewire\Component;
use App\Models\Task;


new class extends Component
{
    public $title, $description;

    public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'nullable'
        ]);

        \App\Models\Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => auth()->id()
        ]);

        $this->reset(['title', 'description']);
    }
};
?>

<div>
    
    <div class="max-w-5xl mx-auto mt-6">

        <!-- FORMULARIO -->
        <div class="bg-white p-4 shadow rounded mb-4">

            <input type="text" wire:model="title"
                placeholder="Título"
                class="w-full border p-2 mb-2">

            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <textarea wire:model="description"
                placeholder="Descripción"
                class="w-full border p-2 mb-2"></textarea>

            <button wire:click="save"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </div>

        <!-- LISTA -->
        <div class="bg-white shadow rounded">
            @foreach(\App\Models\Task::where('user_id', auth()->id())->latest()->get() as $task)
                <div class="border-b p-4 flex justify-between items-center">

                    <div>
                        <h3 class="font-bold text-lg">
                            {{ $task->title }}
                        </h3>

                        <span class="{{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
                            {{ $task->completed ? '✔ Completada' : 'Pendiente' }}
                        </span>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
    
</div>