<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NewsListResource;

class NewsController extends Controller
{
    public function index(){
        $result = News::with('user:id,name')->get();
        return NewsListResource::collection($result);
    }

    public function show($id){
        $result = News::with('user:id,name')->findOrFail($id);
        return new NewsListResource($result);
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'text' => 'required',
            'image' => 'mimes:png,jpg,jfif'
        ]);
        
        // Name Image Default
        $nameImage = null;

        // Jika ada image
        if ($request->file('image')) {
            $extImage = $request->file('image')->extension();
            $nameNews = strtolower(str_replace(' ','', $request->name));
            $nameImage = $nameNews . time() . '.' . $extImage;
            // simpan ke local
            $request->file('image')->storeAs('img', $nameImage);
        }

        // Olah data
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $nameImage;

        // Store database
        $result = News::create($data);
        return response(['message'=>"Succes create news", 'data'=>$result]);
    }
    
    public function update($id, Request $request){
        $request->validate([
            'name'=>'required|max:100',
            'text'=>'required',
            'image'=>'mimes:png,jpg,jfif'
        ]);
        
        // jika ada image
        if ($request->file('image')) {
            $extImage = $request->file('image')->extension();
            $nameNews = strtolower(str_replace(' ','', $request->name));
            $nameImage = $nameNews . time() . '.' . $extImage;
            // simpan ke local
            $request->file('image')->storeAs('img', $nameImage);
            
            // olah data
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['image'] = $nameImage;
            
            // simpan data
            $result = News::findOrFail($id);
            $result->update($data);
            
            //retunr
            return response(['message'=>"Succes update news and replace image", 'data'=>$result]);
        }
        
        //olah data
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        // simpan data
        $result = News::findOrFail($id);
        $result->update($data);

        // return
        return response(['message'=>"Succes update news no replace image", 'data'=>$result]);
    }
}