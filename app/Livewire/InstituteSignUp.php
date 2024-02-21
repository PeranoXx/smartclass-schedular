<?php

namespace App\Livewire;

use App\Models\Institute;
use App\Notifications\OneTimePasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class InstituteSignUp extends Component
{
    public $name = 'Admin';
    public $email = 'admin@admin.com';
    public $contact_number = '1234567890';
    public $password = 'admin@admin.com';
    public $confirm_password = 'admin@admin.com';

    protected $rules = [
        'name' => 'required|unique:institutes',
        'email' => 'required|email|unique:institutes',
        'contact_number' => 'required|numeric|min:10',
        'password' => 'required|min:8',
        'confirm_password' => 'same:password'
    ];

    public function render()
    {
        return view('livewire.institute-sign-up');
    }

    public function submit()
    {
        $this->validate();

        try {
            $otp = rand(10000, 999999);
            Institute::create([
                'name' => $this->name,
                'email' => $this->email,
                'contact_number' => $this->contact_number,
                'password' => Hash::make($this->password),
                'otp' => $otp,
            ]);


            Notification::route('mail', [
                $this->email => $this->name,
            ])->notify(new OneTimePasswordNotification($otp));

            toastr()->success('Sign up successfully.');

            return redirect()->to('/sign-in');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
        }
    }

    public function clearForm()
    {
        $this->name = null;
        $this->email = null;
        $this->contact_number = null;
        $this->password = null;
    }
}
