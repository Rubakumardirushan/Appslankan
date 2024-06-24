<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread_View extends Model
{
    use HasFactory;
    protected $fillable = [
        'thread_id',
        'auth_id',
    ];
}
