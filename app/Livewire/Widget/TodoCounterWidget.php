<?php

namespace App\Livewire\Widget;

use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoCounterWidget extends Component
{
    public $count;
    public $userTodosCount;

    public function mount(TodoRepository $todoRepository): void
    {
        $this->count = $todoRepository->allCount();
        $this->userTodosCount = $todoRepository->allCountByUser(Auth::user());
    }
}
