<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
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
        $users = User::where('first_name', 'like', '%'.$this->search.'%')
                    ->orWhere('last_name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('birth_date', 'like', '%'.$this->search.'%')
                    ->orderBy($this->sortField, $this->sortDirection)->paginate(10);
        return view('livewire.user-list',compact('users'));
    }

    public function delete($id){
        User::where('id',$id)->delete();
    }
}
