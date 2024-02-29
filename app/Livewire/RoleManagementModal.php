<?php

namespace App\Livewire;

use App\Models\Role;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class RoleManagementModal extends ModalComponent
{
    public $id;
    public $name;
    public $role_id;

    public function render()
    {
        return view('livewire.role-management-modal');
    }

    public function submit(){
        
        $this->validate([
            'name' => ['required', Rule::unique('roles')->ignore($this->role_id)],
        ]);
        if(!isset($this->role_id)){
            Role::create([
                'name' => $this->name,
                'guard_name' => 'web'
            ]);
            toastr()->success('role created successfully.');
        }else{
            Role::where('id', $this->role_id)->update([
                'name' => $this->name
            ]);
            toastr()->success('role updated successfully.');
        }

        $this->closeModal();
        return redirect()->route('role-management.index');
    }
    
    public function close(){
        $this->closeModal();
    }
}
