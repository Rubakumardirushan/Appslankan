<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Appslanka\Forum\Models\Post;

class Thread extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'channel',
        'replies_count',
        'views',
        'solved',
        'avatar',
        'author_name',
        'auth_id',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
 
          
            
          
           
           
        
       
         
