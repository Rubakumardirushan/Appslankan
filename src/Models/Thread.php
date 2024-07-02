<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appslankan\Forum\Models\Post;
use App\Models\User;
use Appslankan\Forum\Models\Category;
class Thread extends Model
{
    use HasFactory;
    protected $table=''forum_flex_threads';
    protected $fillable = [
        'title',
        'body',
       'category_id',
         'author_id',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
