<?php

namespace App\Livewire\institute;

use App\Models\Institute;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class InstituteProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $imagePreview;
    public $name;
    public $address;
    public $contact_number;

    public function render()
    {
        return view('livewire.institute.institute-profile');
    }

    public function mount()
    {
        $this->name = authUser()->name;
        $this->address = authUser()->address;
        $this->contact_number = authUser()->contact_number;
        $this->imagePreview = authUser()->image ? asset('storage/institute_image/' . authUser()->image)  : NULL;
    }
    

    public function update()
    {
        $this->validate([
            'name' => ['required', Rule::unique('institutes')->ignore(authUser()->id)],
            'address' => 'required',
            'contact_number' => ['required', 'numeric', 'min:10', Rule::unique('institutes')->ignore(authUser()->id)],
        ]);
        try {
           
            if ($this->image) {
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('public/institute_image', $imageName);
            } else {
                $imageName = $this->image;
            }
            Institute::where('id', authUser()->id)->update([
                'name' => $this->name,
                'address' => $this->address,
                'contact_number' => $this->contact_number,
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
