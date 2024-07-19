<?php

namespace Appslankan\Forum\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Forumuser extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table='forum_flex_users';
    
    protected $fillable = [
        'name',
        'email',
        'password',
      
    ];
}
