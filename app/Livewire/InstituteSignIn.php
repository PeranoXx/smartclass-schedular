<?php

namespace App\Livewire;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstituteSignIn extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
     
    public function render()
    {
        return view('livewire.institute-sign-in');
    }

    public function submit(){
        $this->validate();
        if (Auth::guard('institute')->attempt(['email' => $this->email, 'password' => $this->password])) {
            toastr()->success('Sign in successfully.');
            return redirect()->route('dashboard');
        }else{
            toastr()->error('Invalid email or password.');
            return back();
        }
    }
}
