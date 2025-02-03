<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Counter extends Component
{
    public int $count = 0;

    #[Computed]
    public function secondsSinceStart(): int
    {
        return $this->count + 1;
    }

    public function increment(): void
    {
        $this->count++;
    }

    public function mount(int $count = 0): void
    {
        $this->count = $count;
        sleep(5);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
