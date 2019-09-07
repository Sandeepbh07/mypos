<?php

namespace App\Http\Repository;
use App\Http\Interfaces\CustomerInterface;
use App\Customers;
class CustomerRepository implements CustomerInterface{
    protected $model;
    public function __construct(Customers $model){
        $this->model=$model;
    }
    public function index(){
        return $this->model->all();
    }
    public function store($request){
        $this->model->create($request->all());
    }
    public function edit($id){
       return $this->model::findOrFail($id);
    }
    public function update($params,$id){
        $this->model->edit($id)->update($params);
    }
    public function destroy($id){
        $this->model->edit($id)->delete();
    }
}