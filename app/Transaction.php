<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable=['total','amount_paid','remaining_amount','user_id'];
    //
    protected $with=['customer'];
    public function sales(){
        return $this->hasMany(Sales::class,'transaction_id');
    }
    public function customer(){
       return $this->belongsTo(Customers::class,'user_id');
    }
}
