<?php

namespace App\Livewire;

use App\Models\Role ;
use Livewire\Component;
use Livewire\WithPagination;

class CreateRole extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchGname = '';
    public $sortField;
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.create-role',[
            'role' => Role::where('name', 'like', '%'.$this->searchName.'%')->where('guard_name', 'like', '%'.$this->searchGname.'%')->orderBy($this->sortField,$this->sortDirection)->paginate(10),
        ]);
    }

    public function delete($id){
        // dd($id);

        Role::where('id',$id)->delete();
    }

}
