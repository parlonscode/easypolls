<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;

    public function incrementCount(): void
    {
        $this->count++;
    }

    public function decrementCount(): void
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
