<?php

namespace App\Livewire;

use Livewire\Component;

class InstituteSignUp extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.institute-sign-up');
    }

    public function submit(){
        $this->validate();
        dd($this->name);
    }
}
