<?php

namespace App\Livewire;

use App\Models\Role ;
use Livewire\Component;

class CreateRole extends Component
{
    

    public function render()
    {

        $role = Role::all();
        $data = [
            'role' => $role
        ];
        return view('livewire.create-role',compact('role'));
    }

    public function delete($id){
        // dd($id);

        Role::where('id',$id)->delete();
    }

}
