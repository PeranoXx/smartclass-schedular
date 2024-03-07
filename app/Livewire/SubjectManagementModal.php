<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class SubjectManagementModal extends ModalComponent
{
    public $id;
    public $name;
    public $subject_id;

    public function render()
    {
        return view('livewire.subject-management-modal');
    }
    public function submit(){
        
        $this->validate([
            'name' => ['required', Rule::unique('subjects')->where(function ($query) {
                // Add your additional condition here
                $query->where('institute_id', authUser()->id);
            })->ignore($this->subject_id)],
        ]);
        if(!isset($this->subject_id)){
            Subject::create([
                'institute_id' => authUser()->id,
                'name' => $this->name,
            ]);
            toastr()->success('subject created successfully.');
        }else{
            Subject::where('id', $this->subject_id)->update([
                'name' => $this->name
            ]);
            toastr()->success('subject updated successfully.');
        }

        $this->closeModal();
        return redirect()->route('subject-management.index');
    }

    public function close(){
        $this->closeModal();
    }
}
