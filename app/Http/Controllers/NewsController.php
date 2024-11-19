<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsListResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $result = News::with('user:id,name')->get();
        return NewsListResource::collection($result);
    }
}