<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appslankan\Forum\Models\Thread;
use Appslankan\Forum\User;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'thread_id',
        'content',
    ];
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
