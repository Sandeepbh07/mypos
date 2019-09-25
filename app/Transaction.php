<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable=['total','amount_paid','remaining_amount','user_id'];
    //
    public function sales(){
        return $this->hasMany(Sales::class,'transaction_id');
    }
}
