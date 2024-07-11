<?php

namespace Appslankan\Forum\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends BaseController
{
    public function index(){
        return view('forum-flex::livewire.forum');
     
    }
}
