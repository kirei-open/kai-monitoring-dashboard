<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout;


class NavbarComponent extends Component
{    
    public function logout(Logout $logout)
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }
    public function render()
    {
        return view('livewire.navbar-component');
    }
}
