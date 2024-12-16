<?php
// namespace App\Livewire;

// use Livewire\Component;

// class Login extends Component
// {
//     public function render()
//     {
//         return view('livewire.login');
//     }
// }

// // app/Http/Livewire/Login.php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/');
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid credentials.');
        }
    }
}

