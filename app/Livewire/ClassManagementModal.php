<?php

namespace App\Livewire;

use App\Models\ClassRoom;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class ClassManagementModal extends ModalComponent
{
    public $id;
    public $name;
    public $class_id;

    public function render()
    {
        return view('livewire.class-management-modal');
    }

    public function submit(){
        
        $this->validate([
            'name' => ['required', Rule::unique('class_rooms')->ignore($this->class_id)],
        ]);
        if(!isset($this->class_id)){
            ClassRoom::create([
                'institute_id' => authUser()->id,
                'name' => $this->name,
            ]);
            toastr()->success('class created successfully.');
        }else{
            ClassRoom::where('id', $this->class_id)->update([
                'name' => $this->name
            ]);
            toastr()->success('class updated successfully.');
        }

        $this->closeModal();
        return redirect()->route('class-management.index');
    }
    
    public function close(){
        $this->closeModal();
    }
}
