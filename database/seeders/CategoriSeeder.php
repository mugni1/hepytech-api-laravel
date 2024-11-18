<?php

namespace Database\Seeders;

use App\Models\Categori;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Categori::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'=>'mobile'],
            ['name'=>'desktop'],
            ['name'=>'website']
        ];

        collect($data)->map(function($item){
            Categori::insert([
                'name'=>$item['name'],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        });
    }
}