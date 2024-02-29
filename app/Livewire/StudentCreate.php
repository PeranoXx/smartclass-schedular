<?php

namespace App\Livewire;

use App\Models\Batch;
use App\Models\ClassRoom;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Flasher\Laravel\Http\Request;
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
    public $batch_id;
    public $class_room = 0;
    public $role = 0;

    // public function mount(){
    //     $user = User::find($this->id);
        
    //     $this->first_name = $user->first_name;
    //     $this->last_name = $user->last_name;
    //     $this->email = $user->email;
    //     $this->contact_number = $user->contact_number;
    //     $this->gender = $user->gender;
    //     $this->birth_date = $user->birth_date;
    //     $this->role = $user->role;
    //     $this->imagePreview = $user->image ? asset('storage/user_image/' . $user->image)  : NULL;
    // }

    public function render()
    {
        $class_data = ClassRoom::all();
        $batch = Batch::all()->where('class_room_id' , $this->class_room);
        return view('livewire.student-create',compact('class_data','batch'));
        $this->imagePreview = $this->photo ? asset('storage/user_image/' . $this->photo)  : NULL;
    }
    
    public function submit(){
        // dd($this->class_room);
        // dd($this->class);
        // dd($this->father_contact_number);
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:students',
            'father_name' => 'required',
            'father_contact_number' => 'required|unique:students|min:10|numeric',
            'mother_name' => 'required',
            'mother_contact_number' => 'required|unique:students|min:10|numeric',
            'contact_number' => 'required|min:10|numeric',
            'email' => 'required|unique:students|email',
            'gender' => 'required|string|in:male,female,others',
            'birth_date' => 'required',
            'photo' => 'required|image'
        ];
        if (!$this->id) {
                $rules['password'] = 'required|min:8';
            }
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
                'password' => $this->password,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'image' => $imageName,
            ]);
            // dd($this->role);
            toastr()->success("User created successfully");
            return redirect()->route('student-management.index');
        }else {
            $user = Student::where('id', $this->id )->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'contact_number' => $this->contact_number,
                'email' => $this->email,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'image' => $imageName
            ]);
            toastr()->success("User updated successfully");
         }
         return redirect()->route('user-management.index');
        }
    public function removeImage(){
        $this->photo = NULL;
        $this->imagePreview = NULL;
    }
}

