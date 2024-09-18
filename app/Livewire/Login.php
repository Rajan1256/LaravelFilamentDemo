<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{

    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user && $user->is_admin) {
            // User is an admin
            session()->flash('error', 'Admins cannot log in through this interface.');
            return;
        }

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->flash('message', 'You have successfully logged in!');

            return $this->redirectRoute('dashboard', navigate: true);
        }

        session()->flash('error', 'Invalid credentials!');
    }
    public function render()
    {
        return view('livewire.login');
    }
}
