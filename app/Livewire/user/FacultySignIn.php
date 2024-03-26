<?php

namespace App\Livewire\user;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FacultySignIn extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function render()
    {
        return view('livewire.user.faculty-sign-in');
    }

    public function submit(){
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            toastr()->success('Sign in successfully.');
            return redirect()->route('dashboard');
        }else{
            toastr()->error('Invalid email or password.');
            return back();
        }
    }
}
