<?php

namespace App\Livewire;

use App\Models\LactureTiming;
use Livewire\Component;

class CreateLactureTiming extends Component
{
    public $id;
    public $lacture_name;
    public $start_time;
    public $end_time;
    public $weeks = [];
    public $is_break = false;
    public $resultObject = [];

    public function mount(){
        if (isset($this->id)) {
            $lacture = LactureTiming::find($this->id);
        
            $this->lacture_name = $lacture->lacture_name;
            $this->start_time = $lacture->start_time;
            $this->end_time = $lacture->end_time;
            $this->is_break = $lacture->is_break;
        }
    }

    public function render()
    {
        $lactures = LactureTiming::find($this->id);
        // dd($lactures->weeks);
        return view('livewire.create-lacture-timing', compact('lactures'));
    }

    public function submit(){

        $obj = (object)$this->weeks;
        // dd($obj);

        $this->validate([
            'lacture_name' => ['required'],
            'start_time' => ['required' , 'date_format:H:i', 'unique:lacture_timings'],
            'end_time' => ['required' , 'date_format:H:i' , 'after:start_time'],
            'weeks' => ['required']
        ]);

        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $resultArray = [];
        foreach ($daysOfWeek as $day) {
            $status = in_array($day, $this->weeks);
            $resultArray[] = ['day' => $day, 'status' => $status];
        }
        $this->resultObject = json_encode($resultArray);

        if (!$this->id) {
            LactureTiming::create([

                'institute_id' => authUser()->id,
                'lacture_name' => $this->lacture_name,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'weeks' => $this->resultObject,
                'is_break' => $this->is_break
            ]);
            toastr()->success('lacture timing created successfully.');
            return redirect()->route('lacture-management.index');
        }else{
            LactureTiming::where('id' , $this->id)->update([

                'institute_id' => authUser()->id,
                'lacture_name' => $this->lacture_name,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'weeks' => $this->resultObject,
                'is_break' => $this->is_break
            ]);
            toastr()->success('lacture timing updated successfully.');
            return redirect()->route('lacture-management.index');
        }
        
    }
}
