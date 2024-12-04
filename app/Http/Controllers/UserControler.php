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
    
    public function store(Request $request){
        // validasi
        $request->validate([
            "name" => 'required|max:100',
            "email" => 'email|required',
            "password" => 'required',
            "role_id" => 'required|numeric'
        ]);
        // tampung semua data
        $data = $request->all();
        // store to database
        $result = User::create($data);
        // return 
        return response(['message'=>'Succes Create New User', 'data'=>$result]);
    }
}