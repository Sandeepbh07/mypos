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
        if($request->hasfile('image')){
    
            $name=uniqid().$request->file('image')->getClientOriginalName();
        
            $request['customer_images']=$name;
            $request->file('image')->move(public_path().'/images/customer/',$name);
          
        }
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

    public function getbyuserid($id)
    {
        return $this->model::where('cuid',$id)->get();
    }
}