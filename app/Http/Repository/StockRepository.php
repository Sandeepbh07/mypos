<?php
namespace App\Http\Repository;
use App\Http\Interfaces\StockInterface;
use App\Stock;
class StockRepository implements StockInterface{
protected $model;
public function __construct(Stock $model){
    $this->model=$model;
}
public function index(){
    return $this->model::all();
}
public function store($request){
   $product=$this->model->where('product_id',$request['product_id'])->first();
    if($product)
    {
$this->updatequantity($request->all(),$product->id);
    }
    else{
        $this->model::create($request->all());
    }
}
public function edit($id){
    return $this->model::findOrFail($id);
}
public function update($params,$id){
$this->edit($id)->update($params);
}
public function updatequantity($params,$id)
{
    $stock=$this->edit($id);
    $stock->quantity=($stock->quantity)+($params['quantity']);
    $stock->save();
}
public function deleteStock($id,$quantity){
    $stock=$this->model->where('product_id',$id)->first();
    $stock->quantity=$stock->quantity-$quantity;
    $stock->save();
}
public function destroy($id){
    $this->edit($id)->delete();
}
}

?>