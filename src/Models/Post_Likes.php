<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Likes extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'auth_id',
    ];
    
}
