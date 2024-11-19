<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PortfolioListResource;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;

class PortfolioController extends Controller
{
    public function index(){
       $data = Portfolio::with('categori:id,name')->get();
       return  PortfolioListResource::collection($data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'categori_id' => 'required',
            'image' => 'required|mimes:png,jpg,jfif',
        ]);

        $ektensiImage =  $request->file('image')->extension();
        $namePortfolio = strtolower(str_replace(' ', '', $request->name));
        $imageNameNew = $namePortfolio. time() . '.' . $ektensiImage;

        // simpan ke public storage
        $request->file('image')->storeAs('img',$imageNameNew);
        
        // store ke database
        $dataRequest = $request->all();
        $dataRequest['image'] = $imageNameNew;

        $data = Portfolio::create($dataRequest);
        return response(['message'=>'Success create new portfolio','data'=>$data]);
    }

    public function update($id, Request $request){
        $request->validate([
            'name'=> 'required|max:100',
            'categori_id'=>'required',
            'image'=>'mimes:png,jpg,jfif',
        ]);

        if ($request->file('image')) {
            $ektensiImage =  $request->file('image')->extension();
            $namePortfolio = strtolower(str_replace(' ', '', $request->name));
            $imageNameNew = $namePortfolio. time() . '.' . $ektensiImage;
            // simpan ke public storage
            $request->file('image')->storeAs('img',$imageNameNew);

            // olah data
            $data = $request->all();
            $data['image'] = $imageNameNew;
            // update ke database
            $result = Portfolio::findOrFail($id);
            $result->update($data);
            return response(['message'=>'Success update, Image replace','data'=>$result]);
        }

        // olah data
        $data = $request->all();
        //update data ke db
        $result = Portfolio::findOrFail($id);
        $result->update($data);
        return response(['message'=>'Success update, Image no replace','data'=>$result]);
    }
}