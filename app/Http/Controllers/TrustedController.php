<?php

namespace App\Http\Controllers;

use App\Models\Trusted;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrustedController extends Controller
{
    public function index(){
        $result = Trusted::get();
        return $result;
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg,jfif,jpeg',
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
}