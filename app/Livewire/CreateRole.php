<?php

namespace App\Livewire;

use App\Models\Role ;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateRole extends Component
{
    public $id;
    public $show = false;
    public $name;
    public $action = 'create';
    public $role_id;

    public function render()
    {
        $role = Role::all();
        $data = [
            'role' => $role
        ];
        return view('livewire.create-role',compact('role'));
    }
    
    public function submit(){
        
        $this->validate([
            'name' => ['required', Rule::unique('roles')->ignore($this->role_id)],
        ]);
        
        if ($this->action == "create") {
            Role::create([
                'name' => $this->name,
                'guard_name' => 'web'
            ]);
            toastr()->success('role created successfully.');
        }else{
            // dd($this->role_id);
            Role::where('id', $this->role_id)->update([
                'name' => $this->name
            ]);

        }
        
        return redirect()->to('institute/role-permission');
    }

    public function showModal($role = NULL, $role_id = NULL){
        if(isset($role)){
            $this->name = $role; 
            $this->action = 'update';
            $this->role_id = $role_id;
        }else{
            $this->action = 'create';
            
        }
        $this->show = true;

    }
    
    public function hideModal(){
        $this->show = false;
    }

    public function delete($id){
        // dd($id);

        Role::where('id',$id)->delete();
    }

}
