<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Portfolio::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'=>"Contoh nama 1", 'categori_id'=>1, 'image'=>'contoh image 1'],
            ['name'=>"Contoh nama 2", 'categori_id'=>2, 'image'=>'contoh image 2'],
            ['name'=>"Contoh nama 3", 'categori_id'=>3, 'image'=>'contoh image 3'],
        ];

        collect($data)->map(function($item){
            Portfolio::insert([
                'name'=>$item['name'],
                'categori_id'=>$item['categori_id'],
                'image'=>$item['image'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        });
    }
}