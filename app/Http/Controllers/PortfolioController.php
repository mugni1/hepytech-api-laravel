<?php

namespace App\Http\Controllers;

use App\Http\Resources\PortfolioListResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){
       $data = Portfolio::with('categori:id,name')->get();
       return  PortfolioListResource::collection($data);
    }
}