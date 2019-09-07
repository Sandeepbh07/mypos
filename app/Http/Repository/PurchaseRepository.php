<?php
namespace App\Http\Repository;
use App\Http\Interfaces\PurchaseInterface;
use App\Purchase;
class PurchaseRepository implements PurchaseInterface{
    protected $model;
    public function __construct(Purchase $model){
        $this->model=$model;
    }
    public function index(){
        return $this->model::all();
    }
    public function store($request){
       $this->model::create($request->all());
    }
    public function edit($id){
        return $this->model::findOrFail($id);
    }
    public function update($params,$id){
       $this->edit($id)->update($params);
    }
    public function destroy($id){
        $this->edit($id)->delete();
    }
}