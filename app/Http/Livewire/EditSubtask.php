<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Subtask;

class EditSubtask extends Component
{
    public $subtask = [];

    public function mount($subtask)
    {
      $this->subtask = $subtask->toArray();
    }

    public function increment()
    {
      $this->subtask[] = count($this->subtask);
    }

    public function remove($index)
    {
      $subtask = $this->subtask[$index];
      if (isset($subtask['id'])) {
        Subtask::find($subtask['id'])->delete();
      }
      unset($this->subtask[$index]);
    }

    public function render()
    {
        return view('livewire.edit-subtask');
    }
}
