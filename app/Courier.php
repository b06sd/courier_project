<?php

namespace App;

use Carbon\Carbon;
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
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = str_replace ([','], '' , $value);
    }

//    public function setPickupDateAttribute($value)
//    {
//        $this->attributes['pickup_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
//    }

//    public function getPickupDateAttribute($value)
//    {
//        return isset($value) ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : '';
//    }

//    public function setDispatchDateAttribute($value)
//    {
//        $this->attributes['dispatch_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
//    }

//    public function getDispatchDateAttribute($value)
//    {
//        return isset($value) ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : '';
//    }

//    public function setDeliveryDateAttribute($value)
//    {
//        $this->attributes['delivery_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
//    }

//    public function getDeliveryDateAttribute($value)
//    {
//        return isset($value) ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : '';
//    }
}
