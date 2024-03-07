<?php

namespace App\Livewire\institute;

use App\Models\Institute;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class InstitutePassword extends Component
{
    public $current_password;
    public $new_password;
    public $confirm_new_password;

    public function render()
    {
        return view('livewire.institute.institute-password');
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

        Institute::where('id',authUser()->id)->update([
            'password' => Hash::make($this->new_password)
        ]);

        return toastr()->success('Password updated succssfully');
    }
}
