<?php

namespace App\Livewire\student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;

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
        $students = Student::where('first_name', 'like', '%'.$this->search.'%')
                    ->orWhere('last_name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('birth_date', 'like', '%'.$this->search.'%')
                    ->orderBy($this->sortField, $this->sortDirection)->paginate(10);
        return view('livewire.student.student-list',compact('students'));
    }

    public function delete($id){
        Student::where('id',$id)->delete();
    }
}
