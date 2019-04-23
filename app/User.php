<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password','sex','birthday','phone','address','avatar' ,'role_id',
    ];

    public function role()
    {
    	return $this->belongsTo('App\Role');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
	}
}
