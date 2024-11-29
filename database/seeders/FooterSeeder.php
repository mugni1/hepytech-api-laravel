<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Footer::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            'brand' => 'HEPYTECH',
            'link_faq' => 'link.faq.com',
            'link_youtube' => 'youtube.com',
            'text_information' => 'IT Solution for Your Busines',
            'address' => 'summarecon mb06, Rancabolang, Kec. Gedebage, Kota Bandung, Jawa Barat 40129',
            'link_facebook' => 'facebook.com',
            'link_instagram' => 'instagram.com',
            'link_linkedin' => 'linkedin.com',
            'copyright' => '2024 © hepytech.com',
        ];

        Footer::create([
            'brand' =>  $data['brand'],
            'link_faq' => $data['link_faq'],
            'link_youtube' => $data['link_youtube'],
            'text_information' => $data['text_information'],
            'address' => $data['address'],
            'link_facebook' => $data['link_facebook'],
            'link_instagram' => $data['link_instagram'],
            'link_linkedin' => $data['link_linkedin'],
            'copyright' => $data['copyright'],
        ]);
    }
}