<?php

namespace App\Livewire\user;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class FacultyPassword extends Component
{
    public $current_password;
    public $new_password;
    public $confirm_new_password;

    public function render()
    {
        return view('livewire.user.faculty-password');
    }

    public function changePassword(){
        // dd(authUser()->id);
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'same:new_password'
        ]);

        if (!Hash::check($this->current_password,authUser()->password)) {
            return toastr()->error('Old password dose not match');
        }

        User::where('id',authUser()->id)->update([
            'password' => Hash::make($this->new_password)
        ]);

        toastr()->success('Password updated succssfully');
        return redirect()->route('dashboard'); 

    }
}
