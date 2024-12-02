<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserControler extends Controller
{
    public function index(){
        $result = User::with('role:id,name')->get(['id','name','email','role_id']);
        return response(['data'=>$result]);
    }
}