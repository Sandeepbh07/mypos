<?php
namespace App\Http\Interfaces;

interface ProductInterface{
    public function index();
    public function store( $items);
     public function edit($id);
    public function update($params,$id);
     public function destroy($id);

// public function store(Array $attributes);
}