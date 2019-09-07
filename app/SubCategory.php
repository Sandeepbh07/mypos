<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table="subcategories";
    protected $fillable=['category_id','name'];

    // protected $with=['category'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function test($message)
    {
        return "hello".$message;
    }
    //
}
