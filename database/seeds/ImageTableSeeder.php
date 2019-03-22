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
            'slug' => 'pic',
            'product_id' => 1,
            'status'=> 1,
            
        ],[
            'name' => 'pic1.jpg',
            'slug' => 'pic1',
            'product_id' => 2,
            'status'=> 1,
        ],
        [
            'name' => 'pic2.jpg',
            'slug' => 'pic2',
            'product_id' => 3,
            'status'=> 1,
        ],
        [
            'name' => 'pic3.jpg',
            'slug' => 'pic3',
            'product_id' => 4,
            'status'=> 1,
        ]
    ]);
    }
}
