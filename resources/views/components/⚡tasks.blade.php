<?php

use Livewire\Component;
use App\Models\Task;


new class extends Component
{
    //
};
?>

<div>
    <div class="max-w-5xl mx-auto mt-6">

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