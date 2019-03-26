<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
            'name' => 'pic.jpg',
            'slug' => '/images/product/e825df0bfb2cbb2864b382b6366f2168giay_nike_air_max_270_ah6789103_fb1b8917ceeb43ed9b842511ea1137d2_1024x1024.jpg',
            'product_id' => 1,
            'status'=> 1,
            
        ],[
            'name' => 'pic1.jpg',
            'slug' => '/images/product/7a53820aeb44472ca6b75715947a8221yung_1_fritlagt_bdd5f487848d49e4bf95ff7be0c1f527_1024x1024.jpg',
            'product_id' => 2,
            'status'=> 1,
        ],
        [
            'name' => 'pic2.jpg',
            'slug' => '/images/product/a4971f35df85ab2bbdfee4361d3d8eb9giay_nike_air_27_c_black_sdl651505877_7_3c272_4f51d2a047df4a7aac2fbaf2e807e628_1024x1024.jpg',
            'product_id' => 3,
            'status'=> 1,
        ],
        [
            'name' => 'pic3.jpg',
            'slug' => '/images/product/0915643b182ece9e616e18446bd08c4cgi_y-adidas-ultraboost-goldmedal-a1_1024x1024.jpg',
            'product_id' => 4,
            'status'=> 1,
        ],
        [
            'name' => 'pic4.jpg',
            'slug' => '/images/product/9cefea016adfffa478b2eab878e2b8e0giay-adidas-ultra-boost-4.0-triple-white_1024x1024.jpg',
            'product_id' => 5,
            'status'=> 1,
        ],
        [
            'name' => 'pic5.jpg',
            'slug' => '/images/product/58b398425e8a219ee86a8ad37633e77agiay_nike_air_max_270_ah6789103_fb1b8917ceeb43ed9b842511ea1137d2_1024x1024.jpg',
            'product_id' => 6,
            'status'=> 1,
        ],
        [
            'name' => 'pic6.jpg',
            'slug' => '/images/product/9261506e9ccb89a75dbcdbba42efb2d9nike-airmax1-justdoit-_1024x1024.jpg',
            'product_id' => 7,
            'status'=> 1,
        ],
        [
            'name' => 'pic7.jpg',
            'slug' => '/images/product/ff94dc01bf1268cb0b346bcb17361f4badidas-ultraboost-bb6497_1024x1024.jpg',
            'product_id' => 8,
            'status'=> 1,
        ]
    ]);
    }
}