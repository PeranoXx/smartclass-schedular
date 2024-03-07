<?php

namespace App\Livewire\lecture;

use App\Models\LactureTiming;
use Illuminate\Validation\Rule;
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
        // dd($this->weeks);
        $this->validate([
            'lacture_name' => ['required'],
            'start_time' => ['required' ,  Rule::unique('lacture_timings')->where(function ($query) {
                $query->where('institute_id', authUser()->id);
            })->ignore($this->id)],
            'end_time' => ['required' , 'after:start_time'],
            'weeks' => ['required']
        ]);

        if (!$this->id) {
            LactureTiming::create([

                'institute_id' => authUser()->id,
                'lacture_name' => $this->lacture_name,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'weeks' => json_encode($this->weeks),
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
                'weeks' => json_encode($this->weeks),
                'is_break' => $this->is_break
            ]);
            toastr()->success('lacture timing updated successfully.');
            return redirect()->route('lacture-management.index');
        }
        
    }
}
