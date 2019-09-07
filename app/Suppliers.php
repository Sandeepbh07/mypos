<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //
    protected $fillable=['name','contact','Businessname','Address'];
    public function product(){
        return $this->hasMany(Product::class,'supplier_id');
    }
}
