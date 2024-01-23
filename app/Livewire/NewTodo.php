<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class NewTodo extends Component
{
    use WithPagination;

    public $newtodo;

    protected $rules = [
            "newtodo"=>'required | string | min:3'
    ];

    public function addTodo(){

        $this->validate();

        $todo = new Todo();
        $todo->name=$this->newtodo;
        $todo->completed = false;
        $todo->save();

        $this->reset('newtodo');

        session()->flash('todo',"Data added successfully");

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.new-todo');
    }
}
