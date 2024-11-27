<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = ['title','description','link_contac','link_job_vacancy','image'];
}