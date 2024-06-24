<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
       'replay',
         'auth_id',
            'thread_id',
            'avatar',
            'author_name',
            'best_answer',
            'likes',
            'replay_post_id',



    ];
}

         
       
           
         
          
           
            
       