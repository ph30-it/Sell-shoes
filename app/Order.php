<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id', 'date', 'total', 'payment',    
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function orderDetails()
    {
    	return $this->hasMany('App\OrderDetail');
	}
}
