<?php
namespace App\Http\Repository;

use App\Http\Interfaces\ProductInterface;
use App\Product;

class ProductRepository implements ProductInterface{
    protected $model;
    public function __construct(Product $model)
    {
        $this->model=$model;

    }

    public function index(){

     return $this->model::all();
    }
    public function store($request)
    {

if($request->hasfile('product_images')){
    $name=uniqid().$request->file('product_images')->getClientOriginalName();

    $request['product_image']=$name;
    $request->file('product_images')->move(public_path().'/images/products/',$name);
}
        $this->model->create($request->all());
    }
    public function edit($id){
        return $this->model::findOrFail($id);
    }
        
    public function update($params,$id){
            return $this->edit($id)->update($params);
        }
            
    public function destroy($id){
                return $this->edit($id)->delete();
            }

public function show($id)
{
    return $this->model::find($id);
}
        public function search($key)
        {
return $this->model::where('name', 'LIKE', "%$key%")->get();

        }
}