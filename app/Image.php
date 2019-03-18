<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     protected $table = 'images';

    protected $fillable = [
        'name', 'slug', 'product_id', 'status',
    ];

     public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
