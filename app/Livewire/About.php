<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class About extends Component
{
public $users;

    public function render()
    {
        $this->users=User::count();
        return view('livewire.about');
    }
}