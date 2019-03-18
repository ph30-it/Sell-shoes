<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    protected $table = 'product_sizes';

    protected $fillable = [
        'product_id', 'size_id', 'quantity',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function size()
    {
    	return $this->belongsTo('App\Size');
    }
}
