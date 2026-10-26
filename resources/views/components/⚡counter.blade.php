<?php

use Livewire\Component;

new class extends Component
{
    public $count = 0;
    
    public function increment()
    {
        $this->count++;
    }
    
    public function decrement()
    {
        $this->count--;
    }
};
?>

<div class="bg-[--color-surface] rounded-lg shadow p-6 text-center">
    <h3 class="text-xl font-semibold text-[--color-primary] mb-4">Livewire Test: Counter</h3>
    <div class="text-4xl font-bold text-[--color-text-main] mb-4">{{ $count }}</div>
    <div class="flex justify-center gap-4">
        <button wire:click="decrement" class="px-6 py-2 bg-[--color-status-danger] text-white rounded-lg hover:opacity-80 transition-opacity">
            -
        </button>
        <button wire:click="increment" class="px-6 py-2 bg-[--color-status-success] text-white rounded-lg hover:opacity-80 transition-opacity">
            +
        </button>
    </div>
    <p class="text-sm text-[--color-text-muted] mt-4">Livewire is working! Click buttons to test.</p>
</div>