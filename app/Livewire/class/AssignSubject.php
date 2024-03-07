<?php

namespace App\Livewire\class;

use App\Models\AssignSubject as SubjectAssign;
use App\Models\Subject;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AssignSubject extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $id;
    public $subject_id = 0;

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
        // dd($this->id);
        $subject_data = Subject::all();
        $assign_subject_data = SubjectAssign::all()->where('class_room_id' , $this->id);

        return view('livewire.class.assign-subject',compact('subject_data' , 'assign_subject_data'));
    }

    public function submit(){
        // dd($this->subject_id);
        $this->validate([
            'subject_id' => ['required']
        ]);

        SubjectAssign::create([
            'institute_id' => authUser()->id,
            'class_room_id' => $this->id,
            'subject_id' => $this->subject_id,
        ]);
        toastr()->success('subject assign successfully.');
        return redirect()->route('class-management.index');
    }

    public function submit_and_add(){
        $this->validate([
            'subject_id' => ['required']
        ]);

        SubjectAssign::create([
            'institute_id' => authUser()->id,
            'class_room_id' => $this->id,
            'subject_id' => $this->subject_id,
        ]);
        toastr()->success('subject assign successfully.');
    }

    public function delete($id){
        SubjectAssign::where('id',$id)->delete();
    }
}
