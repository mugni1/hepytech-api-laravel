<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $result = Home::get();
        return response(['data'=>$result]);
    }
    
    public function update($id,Request $request){
    // validate
    $request->validate([
        "title" => "max:100|required",
        "description" => "max:225|required",
        "link_contac" => 'required',
        "link_job_vacancy"=> 'nullable',
        'image' => 'mimes:png,jpg,jfif,jpeg|required'
    ]);
    
    // Store ke public image
    $ekstensi = $request->file('image')->extension();
    $nameImage = "herosection".time() . '.' . $ekstensi;
    $request->file('image')->storeAs('img', $nameImage);
    
    // olah data
    $data = $request->all();
    $data['image'] = $nameImage;

    // update ke database
    $result = Home::findOrFail($id);
    $result->update($data);

    // return
    return response(['message'=>'success update','data'=>$result]);
    }
}