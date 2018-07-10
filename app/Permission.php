<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function setNameAttributes($value){
        $this->attributes['name'] = ucwords($value);
    }
}
