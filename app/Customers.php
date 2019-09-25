<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable=['name','address','contact','cuid','customer_images'];
    public function sales(){
        return $this->hasMany(Sales::class,'customer_id','cuid');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class,'user_id');
    }
 
}

