<?php
namespace Appslankan\Forum\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Appslankan\Forum\Models\Thread;
use Appslankan\Forum\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
class Forumpage extends Component
{
    public $thread, $body, $category, $threads, $categories, $name, $description;
    public $loginpage = false;
    public $threadpage = false, $catgoerypage = false;
    public $showRegisterpage = false, $showLoginpage = false;
    public $successMessage;
    public $username, $password, $email, $password_confirmation;

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
        
        $this->showLoginpage = true;
        }
    }

    public function closelogin()
    {
        $this->showLoginpage = false;
    }
    public function logout()
    {
         $this->email='';
            $this->password='';
        Auth::logout();
        $this->loginpage = true;
    }
}
