<?php

namespace App\Livewire\user;

use App\Models\AssignSubject;
use App\Models\Batch;
use App\Models\ClassRoom;
use App\Models\UserAssignSubject as ModelsUserAssignSubject;
use Livewire\Component;

class UserAssignSubject extends Component
{
    public $id;
    public $class_room = 0;
    public $batch_id = 0;
    public $subject = 0;
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if($this->sortField == $field){
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $class_data = ClassRoom::get();
        $batch = Batch::where('class_room_id' , $this->class_room)->get();
        $subjects = AssignSubject::where('class_room_id' , $this->class_room)->get();
        $assign_subject_data = ModelsUserAssignSubject::get();
        // dd($subject);
        return view('livewire.user.user-assign-subject' , compact('class_data' , 'batch' , 'subjects' , 'assign_subject_data'));
    }
    
    public function submit(){
        // dd($this->subject);
        $this->class_room = $this->class_room == 0 ? "" : $this->class_room;
        $this->batch_id = $this->batch_id == 0 ? "" : $this->batch_id;
        $this->subject = $this->subject == 0 ? "" : $this->subject;
        $this->validate([
            'class_room' => ['required'],
            'batch_id' => ['required'],
            'subject' => ['required']
        ]);
        try {
        // dd($this->subject);
        ModelsUserAssignSubject::create([
            'user_id' => $this->id,
            'class_room_id' => $this->class_room,
            'batch_id' => $this->batch_id,
            'subject_id' => $this->subject
        ]);
        toastr()->success('subject assign successfully.');
        return redirect()->route('user-management.index');
    } catch (\Exception $e) {
        toastr()->error($e->getMessage());
    }

    }

    public function submit_and_add(){
        $this->validate([
            'class_room' => ['required'],
            'batch_id' => ['required'],
            'subject' => ['required']
        ]);

        ModelsUserAssignSubject::create([
            'user_id' => $this->id,
            'class_room_id' => $this->class_room,
            'batch_id' => $this->batch_id,
            'subject_id' => $this->subject
        ]);
        toastr()->success('subject assign successfully.');
    }

    public function change(){
        $this->batch_id = 0;
        $this->subject = 0;
    }

    public function delete($id){
        ModelsUserAssignSubject::where('id',$id)->delete();
    }
}
