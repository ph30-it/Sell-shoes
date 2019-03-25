<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
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
            'name' => 'Giày Nike Air Max 270 White Court',
            'slug' => 'giay-nike-air-max-270-white-court',
            'description' => Str::random(30),
            'price' => 2500000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 2,
            
        ],[
            'name' => 'Giày Adidas Yung 1 "Cloud White"',
            'slug' => 'giay-adidas-yung-1-cloud-white',
            'description' => Str::random(30),
            'price' => 2800000,
            'quantity' => 1200,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Nike Air Max 270 "Triple Black"',
            'slug' => 'giay-nike-air-max-270-triple-black',
            'description' => Str::random(30),
            'price' => 3000000,
            'quantity' => 800,
            'sale' => 15,
            'status' => 1,
            'category_id' => 2,
            'brand_id' => 2,
        ],
        [
            'name' => 'Giày Adidas Ultra BOOST 2.0 "Gold"',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => Str::random(30),
            'price' => 5500000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => Str::random(30),
            'price' => 1800000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Nike Air Max 1 Just Do It Collection"',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => Str::random(30),
            'price' => 1800000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 2,
            'brand_id' => 2,
        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => Str::random(30),
            'price' => 2300000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp A',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => Str::random(30),
            'price' => 2300000,
            'quantity' => 1000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ]
    ]);
    }
}
