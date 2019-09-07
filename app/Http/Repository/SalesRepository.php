<?php
namespace App\Http\Repository;
use App\Http\Interfaces\SalesInterface;
use App\Sales;
class SalesRepository implements SalesInterface{
    protected $model;
    public function __construct(Sales $model){
        $this->model=$model;
    }
    public function index(){
      return $this->model::all();
    }
    public function store($request){
        $this->model->create($request->all());
    }
}