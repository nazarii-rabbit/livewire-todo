<?php

namespace App\Livewire\Widget;

use App\Repositories\UserRepository;
use Livewire\Component;

class UserCounterWidget extends Component
{
    public $count;

    public function mount(UserRepository $userRepository): void
    {
        $this->count = $userRepository->allCount();
    }
}
