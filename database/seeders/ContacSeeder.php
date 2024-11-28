<?php

namespace Database\Seeders;

use App\Models\Contac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ContacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Contac::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = ['facebook' => 'ada fb', 'instagram' => 'ada ig', 'x' => 'ada x'];
        
        Contac::create([
           'facebook' => $data['facebook'],
           'instagram' => $data['instagram'],
           'x' => $data['x'], 
        ]);
    }
}