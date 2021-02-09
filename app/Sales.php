<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{

    protected $fillable=['transaction_id','quantity','discount','vat','product_id','price'];
    protected $with=['transaction'];
public function transaction(){
    return $this->belongsTo(Transaction::class,'transaction_id');
}  
public function product(){
    return $this->belongsTo(Product::class,'product_id');
}






}
