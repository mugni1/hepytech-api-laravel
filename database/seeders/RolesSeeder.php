<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // truncate di di seeder
         Schema::disableForeignKeyConstraints();
         Role::truncate();
         Schema::enableForeignKeyConstraints();

         //data
         $datas = [
            ['name'=>'admin'],
         ];
         
         foreach ($datas as $data) {
            Role::insert([
                'name'=> $data['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
         }
    }
}