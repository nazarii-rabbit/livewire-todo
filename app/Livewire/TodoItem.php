<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoItem extends Component
{
    public Todo $todo;
    public $edit;
    public $newDescription;

    protected $rules = [
        'newDescription' => 'required|min:3|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $this->todo->update([
            'description' => $this->newDescription
        ]);

        $this->edit = null;
    }

    public function remove(): void
    {
        $this->dispatch('remove-todo', todoId: $this->todo->id);
    }

    public function updateTodoStatus(): void
    {
        $this->dispatch('update-todo-item-status', todoId: $this->todo->id);
    }

    public function cancelEdit(): void
    {
        $this->edit = null;
        $this->newDescription = null;
    }

    public function editTodo(Todo $todo): void
    {
        $this->edit = $todo;
        $this->newDescription = $todo->description;
    }
}
