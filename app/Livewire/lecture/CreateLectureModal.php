<?php

namespace App\Livewire\lecture;

use App\Models\AssignLecture;
use App\Models\AssignSubject;
use App\Models\ClassRoom;
use LivewireUI\Modal\ModalComponent;

class CreateLectureModal extends ModalComponent
{
    public $class_room = 0;
    public $subject = 0;
    public $no_of_lectures;
    public $lecture_id;

    public function mount($lecture_id = null)
    {
        if ($lecture_id) {
            $lecture = AssignLecture::find($lecture_id);
            if ($lecture) {
                $this->class_room = $lecture->class_room_id;
                $this->subject = $lecture->subject_id;
                $this->no_of_lectures = $lecture->no_of_lectures;
            }
        }
    }

    public function render()
    {
        $class_data = ClassRoom::get();
        $subjects = AssignSubject::where('class_room_id' , $this->class_room)->get();
        $assign_lecture_data = AssignLecture::get();
        return view('livewire.lecture.create-lecture-modal', compact('class_data' , 'subjects' , 'assign_lecture_data'));
    }

    public function submit(){
        // dd($this->class_room);
        $this->class_room = $this->class_room == 0 ? "" : $this->class_room;
        $this->subject = $this->subject == 0 ? "" : $this->subject;

        $this->validate([
            'class_room' => ['required'],
            'subject' => ['required'],
            'no_of_lectures' => ['required'],
        ]);
        if (!isset($this->lecture_id)) {
            AssignLecture::create([
                'institute_id' => authUser()->id,
                'class_room_id' => $this->class_room,
                'subject_id' => $this->subject,
                'no_of_lectures' => $this->no_of_lectures
            ]);
            toastr()->success('Lacture assign successfully.');
            return redirect()->route('assign-lecture.create');
            
        }else{
            AssignLecture::where('id', $this->lecture_id)->update([
                'class_room_id' => $this->class_room,
                'subject_id' => $this->subject,
                'no_of_lectures' => $this->no_of_lectures
            ]);
            toastr()->success('Lacture updated successfully.');
            return redirect()->route('assign-lecture.create');
        }
    }

    public function close(){
        $this->closeModal();
    }
}
