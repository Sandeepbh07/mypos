<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{ 
    protected $guarded=[''];
    //
    public function supplier(){
        return $this->belongsTo(Suppliers::class,'supplier_id');
    }
}
