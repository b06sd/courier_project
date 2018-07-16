<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
	protected $fillable = [
        'name', 'email', 'phone_number',
    ];
    
    public function consignee()
    {

    	return $this->belongsTo(Consignee::class);
    }
}
