<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	[
            'name' => 'Men',
            'slug' => 'men',
            'description' => Str::random(30),
            
        ],[
            'name' => 'Women',
            'slug' => 'women',
            'description' => Str::random(30),
        ],
        [
            'name' => 'Kid',
            'slug' => 'kid',
            'description' => Str::random(30),
        ]
    ]);
    }
}
