<?php

namespace App\Livewire\student;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $imagePreview;
    public $first_name;
    public $last_name;
    public $username;
    public $contact_number;
    public $father_name;
    public $father_contact_number;
    public $mother_name;
    public $mother_contact_number;
    public $gender;
    public $birth_date;

    public function render()
    {
        return view('livewire.student.student-profile');
    }

    public function mount()
    {
        $this->first_name = authUser()->first_name;
        $this->last_name = authUser()->last_name;
        $this->username = authUser()->username;
        $this->contact_number = authUser()->contact_number;
        $this->father_name = authUser()->father_name;
        $this->father_contact_number = authUser()->father_contact_number;
        $this->mother_name = authUser()->mother_name;
        $this->mother_contact_number = authUser()->mother_contact_number;
        $this->gender = authUser()->gender;
        $this->birth_date = authUser()->birth_date;
        $this->imagePreview = authUser()->image ? asset('storage/user_image/' . authUser()->image)  : NULL;
    }

    public function update()
    {
        $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'contact_number' => ['required', 'numeric', 'min:10', Rule::unique('students')->ignore(authUser()->id)],
            'father_name' => ['required'],
            'father_contact_number' => ['required', 'numeric', 'min:10', Rule::unique('students')->ignore(authUser()->id)],
            'mother_name' => ['required'],
            'father_contact_number' => ['required', 'numeric', 'min:10', Rule::unique('students')->ignore(authUser()->id)],
            'gender' => ['required','string','in:male,female,others'],
            'birth_date' => ['required'],
        ]);
        try {
           
            if ($this->image) {
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('public/user_image', $imageName);
            } else {
                $imageName = $this->image;
            }
            Student::where('id', authUser()->id)->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'contact_number' => $this->contact_number,
                'father_name' => $this->father_name,
                'father_contact_number' => $this->father_contact_number,
                'mother_name' => $this->mother_name,
                'mother_contact_number' => $this->mother_contact_number,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'image' => $imageName
            ]);
            toastr()->success('Profile updated successfully.');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
        }
    }
}
