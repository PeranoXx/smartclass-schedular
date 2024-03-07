<?php

namespace App\Livewire;

use App\Models\Institute;
use App\Notifications\OneTimePasswordNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Otp extends Component
{   

    public $first;
    public $second;
    public $third;
    public $fourth;
    public $fifth;
    public $sixth;

    public function render()
    {
        return view('livewire.otp');
    }

    public function submit(){
        $otp = $this->first.$this->second.$this->third.$this->fourth.$this->fifth.$this->sixth;

        if($otp == authUser()->otp){
            Institute::where('id', authUser()->id)->update(['email_verified_at' => now()]);
            toastr()->success('Email verified.');
            return redirect()->route('dashboard');
        }
        else{
            $this->first = '';
            $this->second = '';
            $this->third = '';
            $this->fourth = '';
            $this->fifth = '';
            $this->sixth = '';
            toastr()->error('Invalid OTP');
        }
    }

    public function resentOTP(){
        $otp = rand(10000, 999999);

        Institute::where('id', authUser()->id)->update(['otp' => $otp]);

        Notification::route('mail', [
            authUser()->email => authUser()->name,
        ])->notify(new OneTimePasswordNotification($otp));

        toastr()->success('OTP sent to you email.');
    }
}
