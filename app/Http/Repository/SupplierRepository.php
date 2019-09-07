<?php
namespace App\Http\Repository;
use App\Http\Interfaces\SupplierInterface;
use App\Suppliers;
 class SupplierRepository implements SupplierInterface{ 


     protected $model;
     public function __construct(Suppliers $model){
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
  return $this->edit($id)->update($params);
 }
 public function destroy($id){
  return $this->edit($id)->delete();
 }
}
