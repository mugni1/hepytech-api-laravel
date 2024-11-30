<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $result = About::get();
        return response(['data'=>$result]);
    }

    public function update($id, Request $request){
        $request->validate([
            "description" => 'required',
            'clients' => 'required',
            'project' => 'required',
            'staff' => 'required',
            'image' => 'mimes:png,jpg,jpeg,jfif'
        ]);

        $data = $request->all();
        
       if ($request->file('image')) {
        // olah nama gambar
        $extensi = $request->file('image')->extension();
        $nameImage = 'about'.time().'.'.$extensi;
        $request->file('image')->storeAs('img', $nameImage);
        
        // olah data
        $data = $request->all();
        $data['image'] = $nameImage;
       }

        // update ke database
        $result = About::findOrFail($id);
        $result->update($data);

        return response(['message'=>'success update', 'data'=> $result]);
    }
}