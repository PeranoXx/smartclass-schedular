<?php

namespace App\Livewire;

use App\Models\Institute;
use Livewire\Component;
use Livewire\WithFileUploads;

class InstituteProfile extends Component
{
    use WithFileUploads;

    public $image;

    public $name;
    public $address;
    public $contact_number;

    public function render()
    {
        return view('livewire.institute-profile');
    }

    public function update(){
        dd($this->image);

        $this->validate([
            'name' => 'required|unique:institutes',
            'address' => 'required',
            'contact_number' => 'required|numeric|min:10',
            'image.*' => 'image',
        ]);
        $this->image->store('image');
        Institute::where('id', authUser()->id)->update(['name' => $this->name , 'address' => $this->address, 'contact_number' => $this->contact_number]);

    }
}
