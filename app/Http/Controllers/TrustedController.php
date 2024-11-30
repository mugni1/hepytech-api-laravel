<?php

namespace App\Http\Controllers;

use App\Models\Trusted;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrustedController extends Controller
{
    public function index(){
        $result = Trusted::get();
        return response(['data'=>$result]);
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg,jfif,jpeg,webp',
            'link' => 'required'
        ]);

        // olah image
        $extensi = $request->file('image')->extension();
        $nameImage = time() . '.' . $extensi;
        $request->file('image')->storeAs('img', $nameImage);
        
        // olah data
        $data = $request->all();
        $data['image'] = $nameImage;
        
        // store ke db 
        $result = Trusted::create($data);

        return response(['message'=>'success create', 'data'=>$result]);
    }
    
    public function update($id, Request $request){
        $request->validate([
            'image' => 'mimes:png,jpg,jfif,jpeg,webp',
            'link' => 'required'
        ]);
        
         // olah data
         $data = $request->all();

        // jika ada file image
        if($request->file('image')){
            $extensi = $request->file('image')->extension();
            $nameImage = time() . '.' . $extensi;
            $request->file('image')->storeAs('img', $nameImage);

            // olah data
            $data = $request->all();
            $data['image'] = $nameImage;
        }
        
          // store ke db 
          $result = Trusted::findOrFail($id);
          $result->update($data);
          
          // return
          return response(['message'=>'success update', 'data'=>$result]);
    }

    public function delete($id){
        $result = Trusted::findOrFail($id);
        $result->delete();

        // return
        return response(['message'=>'success delete', 'data'=>$result]);
    }
}