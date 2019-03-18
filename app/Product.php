<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'quantity', 'sale', 'feagured', 'status', 'category_id', 'brand_id',
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function images()
    {
    	return $this->hasMany('App\Images');
	}

	public function product_sizes()
    {
    	return $this->hasMany('App\Product_size');
	}

}
