<?php

namespace Appslankan\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appslankan\Forum\Models\Thread;
class Category extends Model
{
    use HasFactory;
     protected $table=''forum_flex_categories';
    protected $fillable = [
       'name',
       'description',
         'color'
    ];

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
