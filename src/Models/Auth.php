<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use  Appslankan\Forum\Models\Thread;
use  Appslankan\Forum\Models\Post_Likes;
use  Appslankan\Forum\Models\Post;
class Auth extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'email',
        'password',
        'github_id',
        'avatar',

    ];
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    public function likes()
    {
        return $this->hasMany(Post_Likes::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    

}
