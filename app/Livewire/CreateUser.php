<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $contact_number;
    public $email;
    public $password;
    public $gender;
    public $birth_date;
    public $photo;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function submit(){

        // dd(authUser()->id);

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required|unique:users|min:10|numeric',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'gender' => 'required|string|in:male,female,others',
            'birth_date' => 'required',
            'photo' => 'required|image'
        ]);

        if ($this->photo) {
            $imageName = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/user_image', $imageName);
        } 

        // dd($imageName);

        User::create([
            'institute_id' => authUser()->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'password' => $this->password,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'image' => $imageName,
        ]);
        toastr()->success("User created successfully");
    }
}
