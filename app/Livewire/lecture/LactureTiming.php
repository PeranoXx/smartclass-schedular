<?php

namespace App\Livewire\lecture;

use App\Models\LactureTiming as ModelsLactureTiming;
use Livewire\Component;
use Livewire\WithPagination;

class LactureTiming extends Component
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
        $lacture_data = ModelsLactureTiming::get();
        return view('livewire.lecture.lacture-timing', compact('lacture_data'));
    }
}
