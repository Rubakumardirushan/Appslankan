<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread_read extends Model
{
    
    protected $table='forum_flex_thread_read';
    protected $fillable = [
        'thread_id',
        'user_id',
        'read_at',
    ];
    use HasFactory;
}
