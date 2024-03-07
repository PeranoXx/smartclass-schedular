<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class CreateSubject extends Component
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
        return view('livewire.create-subject',[
            'subject' => Subject::where('name', 'like', '%'.$this->search.'%')->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete($id){
        Subject::where('id',$id)->delete();
        toastr()->success('subject deleted successfully.');
    }
}
