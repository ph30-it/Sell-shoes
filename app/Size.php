<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'name',
    ];

    public function product_sizes()
    {
    	return $this->hasMany('App\Product_size');
	}
}
