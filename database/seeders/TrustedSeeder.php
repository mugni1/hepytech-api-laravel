<?php

namespace Database\Seeders;

use App\Models\Trusted;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TrustedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Trusted::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            ['image'=>'image1','link'=>'link1'],
            ['image'=>'image2','link'=>'link2'],
            ['image'=>'image3','link'=>'link3'],
            ['image'=>'image4','link'=>'link4'],
        ];

        collect($data)->map(function ($item){
            Trusted::insert([
                'image'=>$item['image'],
                'link' =>$item['link'],
            ]);
        });
    }
}