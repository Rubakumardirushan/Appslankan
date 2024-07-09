<?php

namespace Appslankan\Forum\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Forumpage extends Component
{
    public $loginpage=false;
    public function render()
    {
        return view('forum-flex::livewire.forumpage');
    }
    
    
    public function mount(){
    if(Auth::check()){
        $this->loginpage = true;
    }else{
        $this->loginpage = false;
    }
}

}
