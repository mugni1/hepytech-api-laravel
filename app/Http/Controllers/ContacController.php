<?php

namespace App\Http\Controllers;

use App\Models\Contac;
use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function index(){
        $result = Contac::get();
        return response(['data'=>$result]);
    }
}