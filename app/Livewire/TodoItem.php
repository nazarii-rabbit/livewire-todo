<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoItem extends Component
{
    public Todo $todo;

    public function remove(): void
    {
        $this->dispatch('remove-todo', todoId: $this->todo->id);
    }

    public function updateTodoStatus(): void
    {
        $this->dispatch('update-todo-item-status', todoId: $this->todo->id);
    }
}
