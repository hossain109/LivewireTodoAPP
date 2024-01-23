<?php

// namespace App\Livewire;

// use App\Models\Todo;
// use Livewire\Component;

// class Search extends Component
// {
//     public $search;
//     protected $queryString = ['search'];
//     public function render()
//     {
//         $todos = Todo::latest()->where('name','like',"%($this->search)%")->paginate(10);
//         //dump($todos);
//         return view('livewire.search',['todos'=> $todos]);
//     }
// }
