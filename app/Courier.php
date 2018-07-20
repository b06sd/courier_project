<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
	protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'product_id',
        'description',
        'received_by',
        'pickup_date',
        'dispatch_date',
        'delivery_date',
        'payment_mode',
        'amount',
    ];
    
    public function consignee()
    {
    	return $this->belongsTo(Consignee::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
