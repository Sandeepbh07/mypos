<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function sales(){
        return $this->hasMany(Transaction::class);
    }
}
