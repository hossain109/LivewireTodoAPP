<?php

namespace App\Livewire;

use App\Models\Todo;
use ErrorException;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

     public $editNewtodo;
     public $newField;
     public $complete;
     public $search;

    protected $rules = [
            "newField"=>'required | string | min:3'
    ];

    public function modifyTodo(Todo $todo){

        $this->editNewtodo = $todo->id;
        $this->newField = $todo->name;
    }

    public function cancel(){
        $this->reset('editNewtodo');
        $this->reset('newField');
    }

    public function update(Todo $todo){
        $this->validateOnly('newField');
        $todo->name=$this->newField;
        $todo->save();
        $this->cancel();
  
    }

    public function toggle(Todo $todo){
       
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function deleteTodo(Todo $todo){
       
        try {
            $todo->delete();
        } catch (ErrorException $err) {
           session()->flash('error', "Failed to delete Todo !");
        }
        session()->flash('success', "Deleted successfully !");
    }

    public function render()
    {
        $todos = Todo::latest()->where('name','like',"%{$this->search}%")->paginate(10);

        return view('livewire.todo-list',['todos'=>$todos]);
    }
}
