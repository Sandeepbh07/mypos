<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
protected $fillable=['product_id','purchase_price','quantity','selling_price'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    //
}
