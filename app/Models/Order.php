<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function Orderditel(){
        return $this->hasMany(Orderditel::class);
    }
}
