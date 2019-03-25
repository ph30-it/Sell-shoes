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
            'slug' => '/images/product/ec8b3cefceb182c7c1ce8d80d2e0ca27anh1.jpg',
            'product_id' => 1,
            'status'=> 1,
            
        ],[
            'name' => 'pic1.jpg',
            'slug' => '/images/product/ad286fe097b9078a599ee2eacf995088anh2.jpg',
            'product_id' => 2,
            'status'=> 1,
        ],
        [
            'name' => 'pic2.jpg',
            'slug' => '/images/product/c8f727af7d3d5d09ba1d5f4096723e12anh3.jpg',
            'product_id' => 3,
            'status'=> 1,
        ],
        [
            'name' => 'pic3.jpg',
            'slug' => '/images/product/ea6898da081f7ebc14c94f70939be1b1anh5.jpg',
            'product_id' => 4,
            'status'=> 1,
        ],
        [
            'name' => 'pic4.jpg',
            'slug' => '/images/product/439ca56af256231930e4625167bcf19dgioithieu3.png',
            'product_id' => 5,
            'status'=> 1,
        ],
        [
            'name' => 'pic5.jpg',
            'slug' => '/images/product/16413d3cb4c09c36bc18d9e5738a1ef8anh4.jpg',
            'product_id' => 6,
            'status'=> 1,
        ],
        [
            'name' => 'pic6.jpg',
            'slug' => '/images/product/16413d3cb4c09c36bc18d9e5738a1ef8anh4.jpg',
            'product_id' => 7,
            'status'=> 1,
        ],
        [
            'name' => 'pic7.jpg',
            'slug' => '/images/product/046ac2b494eab602d8445b2b450866f6giay7.jpg',
            'product_id' => 8,
            'status'=> 1,
        ]
    ]);
    }
}