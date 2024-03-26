<?php

namespace App\Livewire\user;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class FacultyProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $imagePreview;
    public $first_name;
    public $last_name;
    public $gender;
    public $birth_date;
    public $contact_number;
    
    public function render()
    {
        return view('livewire.user.faculty-profile');
    }

    public function mount()
    {
        $this->first_name = authUser()->first_name;
        $this->last_name = authUser()->last_name;
        $this->contact_number = authUser()->contact_number;
        $this->gender = authUser()->gender;
        $this->birth_date = authUser()->birth_date;
        $this->imagePreview = authUser()->image ? asset('storage/user_image/' . authUser()->image)  : NULL;
    }

    public function update()
    {
        $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required','string','in:male,female,others'],
            'birth_date' => ['required'],
            'contact_number' => ['required', 'numeric', 'min:10', Rule::unique('users')->ignore(authUser()->id)],
        ]);
        try {
           
            if ($this->image) {
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('public/user_image', $imageName);
            } else {
                $imageName = $this->image;
            }
            User::where('id', authUser()->id)->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'contact_number' => $this->contact_number,
                'birth_date' => $this->birth_date,
                'image' => $imageName
            ]);
            toastr()->success('Profile updated successfully.');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
        }
    }

    public function removeImage(){
        $this->image = NULL;
        $this->imagePreview = NULL;
    }
}
