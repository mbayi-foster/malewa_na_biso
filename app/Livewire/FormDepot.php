<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormDepot extends Component
{
    use WithFileUploads;
    public $ref;
    public $montant;
    public $date;
    public $photo;
 
    protected $rules = [
        'ref' => 'required',
        'montant' => 'required|numeric',
        'date' => 'required|date',
        'photo' => 'image|max:5120|mimes:jpg,jpeg,png',
    ];
    public function render()
    {
        return view('livewire.form-depot');
    }

    public function submit(){
        $this->validate();
        session()->flash('message', 'Bordereau enregistré avec succès en attente de la validation!');
    }
}
