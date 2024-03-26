<?php

namespace App\Livewire\student;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StudentPassword extends Component
{
    public $current_password;
    public $new_password;
    public $confirm_new_password;

    public function render()
    {
        return view('livewire.student.student-password');
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

        Student::where('id',authUser()->id)->update([
            'password' => Hash::make($this->new_password)
        ]);

        toastr()->success('Password updated succssfully');
        return redirect()->route('dashboard'); 

    }
}
