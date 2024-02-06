<?php

namespace App\Livewire\Dashboard\Users;

use Livewire\Component;

class Index extends Component
{
    public $users, $countries, $states, $cities, $recentUsers;
    
    public function render()
    {
        return view('livewire.dashboard.users.index');
    }
}
