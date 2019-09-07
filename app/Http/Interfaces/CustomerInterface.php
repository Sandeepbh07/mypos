<?php
namespace App\Http\Interfaces;
interface CustomerInterface{
    public function index();
    public function store(Array $items);
     public function edit($id);
    public function update($params,$id);
     public function destroy($id);


}