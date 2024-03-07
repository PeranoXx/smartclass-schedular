<?php

namespace App\Livewire\role;

use App\Models\Role ;
use Livewire\Component;
use Livewire\WithPagination;

class CreateRole extends Component
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
        return view('livewire.role.create-role',[
            'role' => Role::where('name', 'like', '%'.$this->search.'%')->orWhere('guard_name', 'like', '%'.$this->search.'%')->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete($id){
        // dd($id);

        Role::where('id',$id)->delete();
    }

}
