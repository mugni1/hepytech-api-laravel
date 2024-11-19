<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        News::truncate();
        Schema::enableForeignKeyConstraints();
       
        $data = [
            ['name'=>'Judul 1', 'text'=>' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi sint eum aut soluta blanditiis beatae eius. Impedit ea eum, provident aliquid corporis vero, autem libero consectetur unde culpa esse ipsam expedita consequatur, tenetur quisquam nulla a! Explicabo sint ipsum inventore quos beatae iusto. Molestiae harum facilis distinctio molestias beatae dolores?
      ', 'user_id'=> 1],
            ['name'=>'Judul 2', 'text'=>' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi sint eum aut soluta blanditiis beatae eius. Impedit ea eum, provident aliquid corporis vero, autem libero consectetur unde culpa esse ipsam expedita consequatur, tenetur quisquam nulla a! Explicabo sint ipsum inventore quos beatae iusto. Molestiae harum facilis distinctio molestias beatae dolores?
      ', 'user_id'=> 1],
            ['name'=>'Judul 3', 'text'=>' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi sint eum aut soluta blanditiis beatae eius. Impedit ea eum, provident aliquid corporis vero, autem libero consectetur unde culpa esse ipsam expedita consequatur, tenetur quisquam nulla a! Explicabo sint ipsum inventore quos beatae iusto. Molestiae harum facilis distinctio molestias beatae dolores?
      ', 'user_id'=> 1],
        ];
        
        collect($data)->map(function($item){
            News::insert([
                'name' => $item['name'],
                'text' => $item['text'],
                'user_id' => $item['user_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });
    }
}