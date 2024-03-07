<?php

namespace App\Livewire\class;

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
        return view('livewire.class.class-management-modal');
    }

    public function submit(){
        
        $this->validate([
            'name' => ['required', Rule::unique('class_rooms')->where(function ($query) {
                // Add your additional condition here
                $query->where('institute_id', authUser()->id);
            })->ignore($this->class_id)],
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
        return redirect()->route('class.class-management.index');
    }
    
    public function close(){
        $this->closeModal();
    }
}
