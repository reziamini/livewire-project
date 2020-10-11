<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $rules = [
        'email' => 'email|required',
        'name' => 'min:4|required',
        'password' => 'min:6|required'
    ];

    protected $listeners = ['registered'];

    public $name;
    public $email;
    public $password;


    public function registered()
    {
        $this->redirect('/');
    }

    public function updated($inputName, $value){
        $this->validateOnly($inputName, $this->rules);
    }

    public function save()
    {
        $this->validate($this->rules);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->password = '';
        $this->email = '';
        $this->name = '';

        //session()->flash('message', 'User was created successful');
        $this->dispatchBrowserEvent('show-message', ['message' => 'User was created successful']);
    }

    public function render()
    {
        return view('livewire.register')->layout('layouts.base');
    }
}
