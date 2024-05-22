<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface TodoRepositoryInterface
{
    public function all();
    public function allCount();
    public function allCountByUser(User $user);
    public function getAllByUser(User $user);
}
