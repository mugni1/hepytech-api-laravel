<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function index(){
        $result = Categori::select(['id', 'name'])->get();
        return response(['data'=>$result]);
    }
}