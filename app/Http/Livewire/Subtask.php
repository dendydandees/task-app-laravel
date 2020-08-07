<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subtask extends Component
{
    public $subtask = [];

    public function increment()
    {
      $this->subtask[] = count($this->subtask);
    }

    public function remove($index)
    {
      unset($this->subtask[$index]);
    }

    public function render()
    {
        return view('livewire.subtask');
    }
}
