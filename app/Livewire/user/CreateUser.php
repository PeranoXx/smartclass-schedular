<?php

namespace App\Livewire\user;

use App\Models\Role;
use App\Models\User;
use Flasher\Laravel\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $imagePreview;
    public $id;
    public $first_name;
    public $last_name;
    public $contact_number;
    public $email;
    public $password;
    public $gender;
    public $birth_date;
    public $photo;
    public $role = 0;


    public function mount(){
        if (isset($this->id)) {
            $user = User::find($this->id);
        
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->contact_number = $user->contact_number;
            $this->gender = $user->gender;
            $this->birth_date = $user->birth_date;
            $this->role = $user->role;
            $this->imagePreview = $user->image ? asset('storage/user_image/' . $user->image)  : NULL;
        }
    }

    public function render(Request $request)
    {
        // dd($this->id);
        $role_data = Role::all();
        return view('livewire.user.create-user',compact('role_data'));
        $this->imagePreview = $this->photo ? asset('storage/user_image/' . $this->photo)  : NULL;
    }

    public function submit(){

        $this->role = $this->role == 0 ? "" : $this->role;
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_number' =>[ 'required','min:10','numeric', Rule::unique('users')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'email' => ['required','email', Rule::unique('users')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'gender' => ['required','string','in:male,female,others'],
            'birth_date' => ['required'],
            'role' => ['required'],
        ];
        if (!$this->id) {
            $rules['password'] = 'required|min:8';
        }
        $this->validate($rules);
        try {
           

        if ($this->photo) {
            $imageName = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/user_image', $imageName);
        } 

         if (!$this->id) {
            $user = User::create([
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
            $user->assignRole($this->role);
            // dd($this->role);
            toastr()->success("User created successfully");
         }else {
            $user = User::where('id', $this->id )->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'contact_number' => $this->contact_number,
                'email' => $this->email,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'image' => $imageName
            ]);
            // $user->assignRole($this->role);
            toastr()->success("User updated successfully");
            return redirect()->route('user-management.index');
         }
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
        }
    }
    public function removeImage(){
        $this->photo = NULL;
        $this->imagePreview = NULL;
    }
}
