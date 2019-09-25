<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{

    protected $fillable=['transaction_id','quantity','discount','vat','product_id','price'];
public function transaction(){
    return $this->belongsTo(Sales::class);
}  




}
