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

    public function update($id, Request $request){
        $request->validate([
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'x' => 'nullable'
        ]);
        
        $data = $request->all();
        
        $result = Contac::findOrFail($id);
        $result->update($data);

        return response(['message'=>'succes update contac', 'data'=> $result]);
    }
}