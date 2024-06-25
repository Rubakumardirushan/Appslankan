<?php

namespace Appslankan\Forum\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Appslankan\Forum\Models\Thread;
use Appslankan\Forum\Models\Post;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
