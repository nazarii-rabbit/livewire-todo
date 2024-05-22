<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use App\Repositories\TodoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TodoList extends Component
{
    use AuthorizesRequests;

    public $activeTodos;
    public $completedTodos;
    protected $todoRepository;

    private const TRANSITION_STATUS = [
        'active' => 'done',
        'done' => 'active',
    ];

    public function mount(): void
    {
        $this->todoRepository = new TodoRepository();
        $this->fetchTodos();
    }

    #[On('refresh-todo')]
    public function fetchTodos(): void
    {
        $user = Auth::user();

        $this->activeTodos = $this->getActiveTodos($user);
        $this->completedTodos = $this->getDoneTodos($user);
    }

    public function getActiveTodos(User $user): Collection
    {
        return $user->activeTodos()->get();
    }

    public function getDoneTodos(User $user): Collection
    {
        return $user->completedTodos()->get();
    }

    #[On('remove-todo')]
    public function remove($todoId): void
    {
        $todo = Todo::findOrFail($todoId);
        $this->authorize('delete', $todo);

        $todo->delete();

        $this->fetchTodos();
    }

    #[On('update-todo-item-status')]
    public function updateTodoStatus(int $todoId): null
    {
        $todo = Todo::findOrFail($todoId);
        $this->authorize('update', $todo);

        $todo->update([
            'status' => self::TRANSITION_STATUS[$todo->status],
        ]);

        return $this->redirect('/todo-list');
    }
}
