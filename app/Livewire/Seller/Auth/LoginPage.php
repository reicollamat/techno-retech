<?php

namespace App\Livewire\Seller\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('livewire.seller.auth.auth-layout')]
#[Title('Seller Login')]
class LoginPage extends Component
{
    #[Validate('required|email', message: 'Please provide a Email Address')]
    public $email;

    #[Validate('required', message: 'Please provide a Password ')]
    public $password;

    public function render()
    {
        return view('livewire..seller.auth.login-page');
    }

    public function submit()
    {
        //TODO: validate this on the seller table, if account is not found in seller table flash message,
        // no associated seller account is present.

        $validation = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'],
            [
                'email.exists' => 'Email does not exist. Please try again.',
            ]);

        if ($validation) {
            $user = Auth::attempt($validation);
            // dd($user);

            if ($user) {
                $this->redirect(route('seller-landing'));
            } else {
                // TODO: show error like no record found in database or laravel eloquest where email and password
                session()->flash('accountlogin', 'Something went wrong, Please try again.'.$user);
            }
        } else {
            session()->flash('accountlogin', 'Something went wrong, Please try again.');
        }
    }
}
