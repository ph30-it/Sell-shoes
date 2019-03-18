<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
        	[
            'name' => '38',           
        ],[
            'name' => '39',
        ],
        [
            'name' => '40',
        ],
        [
            'name' => '41',
        ],
        [
            'name' => '42',
        ],
        [
            'name' => '43',
        ],
        [
            'name' => '44',
        ],
        [
            'name' => '45',
        ]
    ]);
    }
}
