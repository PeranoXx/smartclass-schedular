<?php

namespace App\Livewire\student;

use App\Models\Batch;
use App\Models\ClassRoom;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Flasher\Laravel\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentCreate extends Component
{
    use WithFileUploads;

    public $imagePreview;
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $father_name;
    public $father_contact_number;
    public $mother_name;
    public $mother_contact_number;
    public $contact_number;
    public $email;
    public $password;
    public $gender;
    public $birth_date;
    public $photo;
    public $batch_id = 0;
    public $class_room = 0;
    public $role = 0;

    public function mount(){
        if (isset($this->id)) {
        $students = Student::find($this->id);   
            // dd($this->batch_id);
        $this->first_name = $students->first_name;
        $this->last_name = $students->last_name;
        $this->username = $students->username;
        $this->email = $students->email;
        $this->father_name = $students->father_name;
        $this->father_contact_number = $students->father_contact_number;
        $this->mother_name = $students->mother_name;
        $this->mother_contact_number = $students->mother_contact_number;
        $this->contact_number = $students->contact_number;
        $this->gender = $students->gender;
        $this->birth_date = $students->birth_date;
        $this->class_room = $students->class_room_id;
        $this->batch_id = $students->batch_id;
        $this->imagePreview = $students->image ? asset('storage/user_image/' . $students->image)  : NULL;

        }
    }

    public function render()
    {
        // dd($this->id);
        $class_data = ClassRoom::all();
        $batch = Batch::all()->where('class_room_id' , $this->class_room);
        // $students = Student::all();
        return view('livewire.student.student-create',compact('class_data','batch'));
        $this->imagePreview = $this->photo ? asset('storage/user_image/' . $this->photo)  : NULL;
    }
    
    public function submit(){
        // dd($this->class_room);
        // dd($this->class);
        // dd($this->father_contact_number);
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required' ,  Rule::unique('students')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'father_name' => ['required'],
            'father_contact_number' => ['required','min:10','numeric' ,  Rule::unique('students')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'mother_name' => ['required'],
            'mother_contact_number' => ['required','min:10','numeric' ,  Rule::unique('students')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'contact_number' => ['required','min:10,','numeric'],
            'email' => ['required','email' ,  Rule::unique('students')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'gender' => ['required','string','in:male,female,others'],
            'birth_date' => ['required']
        ];

        if (!$this->id) {
            $rules['password'] = 'required|min:8';
        }
        // dd($this->validate($rules));
        try {
        $this->validate($rules);
        if ($this->photo) {
            $imageName = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/user_image', $imageName);
        } 

         if (!$this->id) {
            Student::create([
                'institute_id' => authUser()->id,
                'class_room_id' => $this->class_room,
                'batch_id' => $this->batch_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'father_name' => $this->father_name,
                'father_contact_number' => $this->father_contact_number,
                'mother_name' => $this->mother_name,
                'mother_contact_number' => $this->mother_contact_number,
                'contact_number' => $this->contact_number,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'image' => $imageName,
            ]);
            toastr()->success("User created successfully");
            return redirect()->route('student-management.index');
        }else {
            Student::where('id', $this->id )->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'email' => $this->email,
                'father_name' => $this->father_name,
                'father_contact_number' => $this->father_contact_number,
                'mother_name' => $this->mother_name,
                'mother_contact_number' => $this->mother_contact_number,
                'contact_number' => $this->contact_number,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'class_room_id' => $this->class_room,
                'batch_id' => $this->batch_id,
                'image' => $this->photo,
            ]);
            toastr()->success("Student updated successfully");
            return redirect()->route('student-management.index');
        }
    } catch (\Exception $e) {
        // dd($e);
    }
    }
    public function removeImage(){
        $this->photo = NULL;
        $this->imagePreview = NULL;
    }
}

