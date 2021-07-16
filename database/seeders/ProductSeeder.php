<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Oppo Mobile',
                'price' => '10000',
                'description' => 'Generic smartphone',
                'category' => 'Mobile',
                'gallery' => 'https://5.imimg.com/data5/WG/ZM/TG/ANDROID-98089178/product-jpeg-500x500.jpg'
            ],
            [
                'name' => 'Xiaomi Mobile',
                'price' => '10000',
                'description' => 'Generic smartphone',
                'category' => 'Mobile',
                'gallery' => 'https://www.91-img.com/pictures/134177-v9-xiaomi-redmi-k20-mobile-phone-large-1.jpg?tr=q-60'
            ],
            [
                'name' => 'Samsung Mobile',
                'price' => '10000',
                'description' => 'Generic smartphone',
                'category' => 'Mobile',
                'gallery' => 'https://5.imimg.com/data5/NT/UC/WR/SELLER-82975943/samsung-galaxy-a7-a750-mobile-phone-500x500.jpg'
            ]
        ]);
    }
}
