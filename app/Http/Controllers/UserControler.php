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
            "email" => 'email|required|unique:users,email',
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
    
    public function update($id, Request $request){
        $request->validate([
            "name" => 'required|max:100',
            "email" => 'email|required',
            "role_id" => 'required|numeric'
        ]);
        
        // Ambil semua input kecuali password
        $data = $request->except('password');
        
        // Jika password ada dan tidak kosong, hash dan tambahkan ke $data
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $result = User::findOrFail($id);
        $result->update($data);

        return response(['message'=> 'Success Update User', 'data'=>$result]);
    }

    public function delete($id){
        $result = User::findOrFail($id);
        $result->delete();
        
        return response(['message'=> 'Success Delete User', 'data'=>$result]);
    }
}