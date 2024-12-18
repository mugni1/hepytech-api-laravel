<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'categori_id', 'image'];

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categori_id', 'id');
    }
}