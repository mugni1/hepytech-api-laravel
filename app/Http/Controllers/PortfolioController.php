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
            'image' => 'required|mimes:png,jpg',
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
}