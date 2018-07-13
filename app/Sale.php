<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['consignee_id', 'courier_id', 'product_id', 'product_name', 'quantity'];

    public function consignees(){
      return $this->belongsToMany('App\Consignee');
    }

    public function courier(){
      return $this->belongsToMany('App\Courier');
    }

    public function products(){
      return $this->belongsToMany('App\Product');
    }
}
