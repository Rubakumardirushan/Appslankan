<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appslankan\Forum\Models\Post;
use Appslankan\Forum\Models\User;
use Appslankan\Forum\Models\Category;
class Thread extends Model
{
    use HasFactory;
    protected $fillable = [
         'title',
         'body',
         'category_id',
         'author_id',
         'sloved',
         'reply_count'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
