<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable=['name','address','contact','cuid'];
    public function sales(){
        return $this->hasMany(Sales::class,'customer_id','cuid');
    }
}

