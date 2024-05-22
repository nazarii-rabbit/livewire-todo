<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface TodoRepositoryInterface
{
    public function all();
    public function getAllByUser(User $user);
}
