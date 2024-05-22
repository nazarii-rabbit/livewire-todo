<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateTodoForm extends Component
{
    public $description;
    public $popupAddTask = false;

    protected $rules = [
        'description' => 'required|min:3|max:255',
    ];

    public function submit(): void
    {
        $this->validate();

        Todo::create([
            'description' => $this->description,
            'user_id' => Auth::id()
        ]);

        $this->hidePopupAddTask();
        $this->clearDescription();
        $this->dispatch('refresh-todo');
    }

    public function hidePopupAddTask(): void
    {
        $this->popupAddTask = false;
    }

    public function showPopupAddTask(): void
    {
        $this->popupAddTask = true;
    }

    public function clearDescription(): void
    {
        $this->description = '';
    }
}
