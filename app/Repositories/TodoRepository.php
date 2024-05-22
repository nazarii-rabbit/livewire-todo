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

    public function allCount(): int
    {
        return $this->all()->count();
    }

    public function allCountByUser(User $user): int
    {
        return $this->getAllByUser($user)->count();
    }

    public function getAllByUser(User $user)
    {
        return $user->todos()->get();
    }
}
