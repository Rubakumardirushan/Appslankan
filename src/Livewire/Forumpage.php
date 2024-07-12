<?php

namespace Appslankan\Forum\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Appslankan\Forum\Models\Thread;
use Appslankan\Forum\Models\Category;
class Forumpage extends Component
{
    public $thread,$body,$catgoery,$threads,$categories,$name,$description;
    public $loginpage=false;
    public $threadpage=false,$catgoerypage=false;
    public function render()
    {
        
        return view('forum-flex::livewire.forumpage');
    }
    
    
    public function mount(){
        
    if(Auth::check()){
        $this->loginpage = false;
    }else{
        $this->loginpage = true;
    }
    
}

public function store(){
   
   
 
    $threadq = new Thread();
    $threadq->title = $this->thread;
    $threadq->body = $this->body;
    $cat_id=Category::where('name',$this->catgoery)->first();
    $threadq->category_id = $cat_id->id;
    $threadq->author_id = Auth::id();
    $threadq->save();
 
    $this->thread = '';
    $this->body = '';
    $this->catgoery = '';
    $this->threadpage = false;
    $this->categories = Category::all();
        $this->threads=Thread::all();


}

public function addCategory(){
$cats= new Category();
$cats->name = $this->name;
$cats->description = $this->description;
$cats->save();
$this->name = '';
$this->description = '';
$this->catgoerypage = false;
$this->categories = Category::all();
$this->threads=Thread::all();



}
public function showthreadpage(){
    
    $this->threadpage = true;
 
}
public function hidethreadpage(){
    $this->threadpage = false;
}
public function showcatgoerypage(){
    $this->catgoerypage = true;}
public function hidecatgoerypage(){
    $this->catgoerypage = false;
}


}
