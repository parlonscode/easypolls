<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public string $email = '';
    public string $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:3',
    ];

    public function handleFormSubmit(): void
    {
        $this->validate();

        dd($this->email, $this->password);
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
