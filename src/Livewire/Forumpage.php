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
    public $successMessage;
    public function render()
    {
        
        if($this->categories==null){
            $this->categoires="this null";
        }
        return view('forum-flex::livewire.forumpage');
    }
    
    
    public function mount(){
        $this->categories = Category::all();
      
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
  
    $threadq->category_id = 1;
    $threadq->author_id = Auth::id();
    $threadq->save();
    $this->successMessage = 'Category added successfully!';
    $this->thread = '';
    $this->body = '';
    $this->catgoery = '';
    $this->hidecatgoerypage();
   


}

public function addCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:forum_flex_categories',
            'description' => 'required|string|max:500',
        ]);

        $cats = new Category();
        $cats->name = $this->name;
        $cats->description = $this->description;
        $cats->save();

        $this->name = '';
        $this->description = '';
        $this->categories = Category::all();
        $this->hidecatgoerypage();

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
