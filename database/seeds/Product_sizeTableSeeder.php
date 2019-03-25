<?php

use Illuminate\Database\Seeder;

class Product_sizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_sizes')->insert([
        	[
            'product_id' => 1,
            'size_id' => 2,
            'quantity' => 200,
  
        ],[
            'product_id' => 1,
            'size_id' => 3,
            'quantity' => 400,
            
            
        ],
        [
            'product_id' => 2,
            'size_id' => 1,
            'quantity' => 300,
            
            
        ],[
            'product_id' => 2,
            'size_id' => 2,
            'quantity' => 500,  
        ],
        [
            'product_id' => 2,
            'size_id' => 3,
            'quantity' => 500,  
        ],
        [
            'product_id' => 3,
            'size_id' => 2,
            'quantity' => 300,  
        ],
        [
            'product_id' => 3,
            'size_id' => 3,
            'quantity' => 300,  
        ],
        [
            'product_id' => 3,
            'size_id' => 4,
            'quantity' => 400,  
        ],
        [
            'product_id' => 4,
            'size_id' => 2,
            'quantity' => 500,  
        ],[
            'product_id' => 4,
            'size_id' => 4,
            'quantity' => 200,  
        ],[
            'product_id' => 4,
            'size_id' => 5,
            'quantity' => 200,  
        ],[
            'product_id' => 4,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 5,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 5,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 5,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 5,
            'size_id' => 6,
            'quantity' => 200,  
        ],[
            'product_id' => 6,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 6,
            'size_id' => 6,
            'quantity' => 200,  
        ],[
            'product_id' => 6,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 6,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 6,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 7,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 7,
            'size_id' => 6,
            'quantity' => 200,  
        ],[
            'product_id' => 7,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 8,
            'size_id' => 6,
            'quantity' => 200,  
        ],
        [
            'product_id' => 8,
            'size_id' => 6,
            'quantity' => 200,  
        ],
    ]); 
    }
}
