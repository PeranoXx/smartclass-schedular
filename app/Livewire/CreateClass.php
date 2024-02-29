<?php

namespace App\Livewire;

use App\Models\Batch;
use App\Models\ClassRoom;
use Livewire\Component;
use Livewire\WithPagination;

class CreateClass extends Component
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
        return view('livewire.create-class',[
            'class' => ClassRoom::where('name', 'like', '%'.$this->search.'%')->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete($id){
        $batch = Batch::where('class_room_id', $id)->count();
        if ($batch > 0) {
            return toastr()->info('Can not delete class room.');
        }else{
            ClassRoom::where('id',$id)->delete();
        }
    }
}
