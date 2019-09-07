<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with=['subcategory'];
    protected $fillable=['name','categories_id','subcategories_id','quantity','selling_price','purchase_price','supplier_id','vat','discount','user_id','product_image','units'];
    //
    // public function category(){
    //     return $this->belongsTo(Category::class,'categories_id');
    // }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategories_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class,'product_id');
    }
    public function supplier(){
        return $this->belongsTo(Suppliers::class,'supplier_id');
    }
}
