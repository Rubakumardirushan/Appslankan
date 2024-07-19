<?php
namespace Appslankan\Forum\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Appslankan\Forum\Models\Thread;
use Appslankan\Forum\Models\Category;
use Appslankan\Forum\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
class Forumpage extends Component
{
    public $thread, $body, $category, $threads, $categories, $name, $description;
    public $loginpage = false;
    public $postpage=false;
    public $threadpage = false, $catgoerypage = false;
    public $showRegisterpage = false, $showLoginpage = false;
    public $successMessage;
    public $username, $password, $email, $password_confirmation;
    public $authid=false,$editpage=false;
    public $hidecentent=false;
    public $newicons=false;
    public $showform=false;
    public $replayform=false,$post;
    public $replies,$repliesform=false;
public $authids;
    public function render()
    {
        if ($this->categories == null) {
            $this->categories = "this null";
        }
        return view('forum-flex::livewire.forumpage');
    }

    public function mount()
    {
        
        $this->categories = Category::all();
        $this->threads = Thread::all();

        if (Auth::check()) {
            $this->loginpage = false;
        } else {
            $this->loginpage = true;
        }
     
        $this->authid=false;
    }

    public function registerd(){
  
      $validate = $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        $user = new User();
        $user->name = $this->username;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();
        Auth::login($user);
        $this->successMessage = 'User added successfully!';
        $this->showRegisterpage = false;
        $this->loginpage = false;
    }
    public function logind(){
        $validate = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->loginpage = false;
            $this->showLoginpage = false;
           
        } else {
            $this->loginpage = true;
        }
    }
    public function store()
    {
        $this->validate([
            'thread' => 'required|string|max:255',
            'body' => 'required',
            'category' => 'required|integer',
        ]);

        $threadq = new Thread();
        $threadq->title = $this->thread;
        $threadq->body = $this->body;
        $threadq->category_name = Category::where('id', $this->category)->pluck('name')->first();
        $threadq->category_id = $this->category;
        $threadq->author_id = Auth::id();
        $threadq->author_name = Auth::user()->name;
        $threadq->save();

        $this->successMessage = 'Category added successfully!';
        $this->hidethreadpage();
        $this->threads = Thread::all();
        $this->thread = '';
        $this->body = '';
        $this->category = '';
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

    public function showthreadpage()
    {
       
        $this->threadpage = true;
        $this->thread = '';
        $this->body = '';
        $this->category = '';
     
        
    }

    public function hidethreadpage()
    {
        $this->threadpage = false;
        $this->editpage=false;
    }

    public function showcatgoerypage()
    {
        $this->catgoerypage = true;
    }

    public function hidecatgoerypage()
    {
        $this->catgoerypage = false;
    }

    public function register()
    {
        // if redirest login route if not availabe login route show loin page
         
        $loginRouteExists = Route::has('register');
        if ($loginRouteExists) {
            return redirect()->route('register');
        } else {
            $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->showRegisterpage = true;
        }
        
    }

    public function closeregister()
    {
        $this->showRegisterpage = false;
    }

    public function login()
    {
        $loginRouteExists = Route::has('register');
        if ($loginRouteExists) {
            return redirect()->route('login');
        } else {
        $this->email='';
        $this->password='';
        $this->showLoginpage = true;
        }
    }

    public function closelogin()
    {
        $this->showLoginpage = false;
    }
    public function logout()
    {
        $this->repliesform=false;
        $this->showform=false;
         $this->email='';
            $this->password='';
        Auth::logout();
        $this->loginpage = true;
    }
    public function faction($id){
      
        $this->authid=$id;
        $this->newicons=true;
       
    
    }
    public function fdaction($id){
        $this->authid='';
        $this->newicons=false;

    }


   

public function edit(){
    $thread=Thread::where('id',$this->authid)->first();
    $this->thread=$thread->title;
    $this->body=$thread->body;
    $this->category=$thread->category_id;
    $this->act=false;
    $this->editpage=true;
}
 
public function update(){
    $this->validate([
        'thread' => 'required|string|max:255',
        'body' => 'required',
        'category' => 'required|integer',
    ]);
    $thread=Thread::where('id',$this->authid)->first();
    $thread->title = $this->thread;
    $thread->body = $this->body;
    $thread->category_name = Category::where('id', $this->category)->pluck('name')->first();
    $thread->category_id = $this->category;

    $thread->save();
    $this->threads = Thread::all();
    $this->thread = '';
    $this->body = '';
    $this->category = '';
    $this->editpage=false;
    $this->authid=100000;
}

public function destroy(){
    // post and thread hasmany relatuons so thread delete so relat post delete
    $postss=Post::where('thread_id',$this->authid)->delete();
    $thread=Thread::where('id',$this->authid)->delete();

    $this->threads = Thread::all();
    $this->replies=Post::where('thread_id', $this->authid)->get();
    $this->act=false;
}

public function handleThreadClick($id)
{
   /* dd($id);
    $this->postpage=true;
    $this->thread = Thread::where('id', $id)->first();
    */
    if(Auth::id()){
    $this->threads = Thread::where('id', $id)->get();
    $this->replies=Post::where('thread_id', $id)->get();
   $this->repliesform=true;
    $this->showform=true;}


}
public function allthreads(){
    $this->post='';
    $this->replayform=false;
    $this->showform=false;
    $this->hidecentent=false;
    $this->authid='';
    $this->threads = Thread::all();
    $this->repliesform=false;
}
public function myquestion(){
    $this->post='';
    $this->replayform=false;
    $this->showform=false;
    $this->hidecentent=false;
    $this->threads = Thread::where('author_id', Auth::id())->get();
    $this->repliesform=false;
}
public function allcategory(){
    $this->post='';
    $this->replayform=false;
    $this->showform=false;
    $this->categories = Category::all();
    $this->hidecentent=true;
    $this->repliesform=false;
}
public function showtcats($id){
    $this->showform=false;
    $this->threads = Thread::where('category_id', $id)->get();
    $this->hidecentent=false;
    $this->repliesform=false;
}
public function replaytread($name){
    
    $this->replayform=true;
    $this->post='@'.$name;
    
    

}
public function storepost($id){
    
    $this->validate([
        'post' => 'required|string|max:255',
    ]);
    $post = new Post();
    $post->content = $this->post;
    $post->user_id = Auth::id();
    $post->user_name = Auth::user()->name;
    $post->thread_id = $id;
    $post->save();
    $this->replayform=false;
    $this->post='';
    $this->threads = Thread::where('id', $id)->get();
    $this->showform=true;
    $this->replies=Post::where('thread_id', $id)->get();
    $this->replayform=false;
    $this->authids='';

}
public function sloved($id){

    $thread=Thread::where('id',$id)->first();
  
    $thread->sloved='yes';
    $thread->save();
    
    $this->authids='';
    $this->newicons=false;
    $this->threads = Thread::all();




}
public function replaypost($name,$id){
    $this->replayform=false;
    $this->post='@'.$name;
    $this->authids=$id;
    
}


public function myanswer(){
    $myids= Post::where('user_id', Auth::id())->pluck('thread_id');
    $this->threads = Thread::whereIn('id', $myids)->get();
    $this->post='';
    $this->replayform=false;
    $this->showform=false;
    $this->hidecentent=false;
    $this->repliesform=false;

}
}