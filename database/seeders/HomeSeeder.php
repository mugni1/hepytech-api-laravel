<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Home::truncate();
        Schema::enableForeignKeyConstraints();

        $data =  [
            'title'=>'Solusi Digital Terbaik di Ujung Jari Anda',
            'description'=>'Kami melayani pembuatan aplikasi berbasis Mobile, Dekstop dan Website. Ayo wujudkan bisnismu mulai dari sini',
            'link_contac'=>'https://wa.me/+6283120249215',
            'link_job_vacancy'=>'link_job_vacancy',
            'image'=>'image'
        ];
        
        Home::create([
           'title'=> $data['title'],
           'description'=> $data['description'],
           'link_contac' => $data['link_contac'],
           'link_job_vacancy' => $data['link_job_vacancy'],
           'image' => $data['image'],
        ]);
    }
}