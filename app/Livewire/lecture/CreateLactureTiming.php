<?php

namespace App\Livewire\lecture;

use App\Models\LactureTiming;
use Livewire\Component;

class CreateLactureTiming extends Component
{
    public $id;
    public $lacture_name;
    public $start_time;
    public $end_time;
    // public $weeks = [];
    public $weeks = [
        ["day" => "monday", "status" => false],
        ["day" => "tuesday", "status" => false],
        ["day" => "wednesday", "status" => false],
        ["day" => "thursday", "status" => false],
        ["day" => "friday", "status" => false],
        ["day" => "saturday", "status" => false],
        ["day" => "sunday", "status" => false]
    ];
    public $is_break = false;
    public $resultObject = [];

    public function mount(){
        if (isset($this->id)) {
            $lacture = LactureTiming::find($this->id);
        
            $this->lacture_name = $lacture->lacture_name;
            $this->start_time = $lacture->start_time;
            $this->end_time = $lacture->end_time;
            $this->is_break = $lacture->is_break;

            $weeksArray = json_decode($lacture->weeks, true);

            foreach ($this->weeks as $index => $week) {
                $this->weeks[$index]['status'] = $weeksArray[$index]['status'];
            }
        }
    }

    public function render()
    {
        $lactures = LactureTiming::find($this->id);
        return view('livewire.lecture.create-lacture-timing', compact('lactures'));
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

        // $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $resultArray = [];
        foreach ($this->weeks as $day) {
            $status = in_array($day, $this->weeks);
            $resultArray = [$day, $status];
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
