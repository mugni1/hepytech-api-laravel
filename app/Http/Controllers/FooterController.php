<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){
        $result = Footer::get();
        return response(['data'=>$result]);
    }

    public function update($id, Request $request){
        $request->validate( [
            'brand' => 'required|max:100',
            'link_faq' => 'required',
            'link_youtube'=> 'required',
            'text_information' => 'required',
            'address' => 'required',
            'link_facebook' => 'required',
            'link_instagram' => 'required',
            'link_linkedin' => 'required',
            'copyright' => 'required'
        ]);

        $data = $request->all();
        
        $result = Footer::findOrFail($id);
        $result->update($data);

        return response(['message'=>'success update footer', 'data'=>$result]);
    }

}