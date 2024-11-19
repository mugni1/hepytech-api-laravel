<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','text','user_id','image'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}