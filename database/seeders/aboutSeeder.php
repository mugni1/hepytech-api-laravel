<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class aboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        About::truncate();
        Schema::enableForeignKeyConstraints();

        $data = ['description'=>'Hepytech is a software development company mobile-based applications (android and IOS), desktop applications and website development. Hepytech is a subsidiary of PT. Halo Mepy. It was officially established on August 17, 2022. However, the business has been running for more than 3 years before the establishment of Hepytech. Hepytech is supported by experienced and skilled professional experts in their fields. Relationships both internally and externally, honesty and professionalism, as well as providing the best solutions & innovations in the field of software development are our commitments to provide satisfaction to our clients.','clients'=>200,'project'=>200,'staff'=>100,'image'=>'image.png'];
        
        About::create([
            'description'=> $data['description'],
            'clients' => $data['clients'],
            'project' => $data['project'],
            'staff' => $data['staff'],
            'image' => $data['image']
        ]);
    }
}