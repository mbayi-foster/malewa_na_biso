<?php

namespace App\Livewire;

use Livewire\Component;

class AlertSucces extends Component
{
    public $message;

    public function mount($message){
        $this->message = $message;
    }
    public function render()
    {
        return view('livewire.alert-succes');
    }
}
