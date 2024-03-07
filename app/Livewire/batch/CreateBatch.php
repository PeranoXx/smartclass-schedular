<?php

namespace App\Livewire\batch;

use App\Models\Batch;
use Livewire\Component;
use Livewire\WithPagination;

class CreateBatch extends Component
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
        return view('livewire.batch.create-batch',[
            'batch' => Batch::where('name', 'like', '%'.$this->search.'%')->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete($id){
        Batch::where('id',$id)->delete();
    }
}
