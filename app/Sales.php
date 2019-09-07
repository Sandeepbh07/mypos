<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{

public function transaction(){
    return $this->belongsTo(Sales::class);
}  




}
