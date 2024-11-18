<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        //data
        $datas = [
           ['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make("admin123"), 'role_id'=>1],
        ];
        
        collect($datas)->map(function($item){
            User::insert([
                'name'=>$item['name'],
                'email'=>$item['email'],
                'password'=>$item['password'],
                'role_id'=>$item['role_id'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        });
    }
}