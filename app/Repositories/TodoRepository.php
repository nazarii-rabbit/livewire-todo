<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Models\User;
use App\Repositories\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public function all()
    {
        return Todo::all();
    }

    public function getAllByUser(User $user)
    {
        return $user->todos()->get();
    }
}
