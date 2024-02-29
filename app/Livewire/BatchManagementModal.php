<?php

namespace App\Livewire;

use App\Models\Batch;
use App\Models\ClassRoom;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class BatchManagementModal extends ModalComponent
{
    public $id;
    public $name;
    public $batch_id;
    public $class = 0; 
    public $class_id;

    public function render()
    {

        $class_data = ClassRoom::all();
        return view('livewire.batch-management-modal',compact('class_data'));
    }

    public function submit(){
        // dd($this->class);
        $this->validate([
            'name' => ['required', Rule::unique('batches')->ignore($this->batch_id)],
        ]);
        if(!isset($this->batch_id)){
            Batch::create([
                'institute_id' => authUser()->id,
                'class_room_id' => $this->class,
                'name' => $this->name,
            ]);
            toastr()->success('class created successfully.');
        }else{
            Batch::where('id', $this->batch_id)->update([
                'class_room_id' => $this->class,
                'name' => $this->name
            ]);
            toastr()->success('class updated successfully.');
        }

        $this->closeModal();
        return redirect()->route('batch-management.index');
    }
    
    public function close(){
        $this->closeModal();
    }
}
