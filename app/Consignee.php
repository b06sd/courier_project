<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number',
    ];

    public function courier()
    {

    	return $this->hasMany(Courier::class);
    }
}
