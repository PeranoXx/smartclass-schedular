<?php

namespace App\Livewire;

use App\Models\Institute;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class InstituteSignUp extends Component
{
    public $name;
    public $email;
    public $contact_number;
    public $password ;
    public $confirm_password;

    protected $rules = [
        'name' => 'required|unique:institutes',
        'email' => 'required|email|unique:institutes',
        'contact_number' => 'required|numeric|min:10',
        'password' => 'required|min:8',
        'confirm_password' => 'same:password'
    ];

    public function render()
    {
        return view('livewire.institute-sign-up');
    }

    public function submit(){
        $this->validate();
        
        Institute::create([
            'name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'password' => Hash::make($this->password),
        ]);
        
        return redirect()->to('/sign-in');
    }

    public function clearForm(){
        $this->name = null;
        $this->email = null;
        $this->contact_number = null;
        $this->password = null;
    }
}
