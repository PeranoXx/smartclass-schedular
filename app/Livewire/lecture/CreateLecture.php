<?php

namespace App\Livewire\lecture;

use App\Models\AssignLecture;
use Livewire\Component;
use Livewire\WithPagination;

class CreateLecture extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $assign_lecture = AssignLecture::get();
        return view('livewire.lecture.create-lecture' , compact('assign_lecture'));
    }

    public function delete($id){
        AssignLecture::where('id',$id)->delete();
    }
}
