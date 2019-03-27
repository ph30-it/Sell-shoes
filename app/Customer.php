<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customers';

    protected $fillable = [
        'user_id', 'name', 'email', 'address', 'phone', 'note',
    ];

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}

