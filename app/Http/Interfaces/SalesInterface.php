<?php
namespace App\Http\Interfaces;
interface SalesInterface{
    public function index();
    public function store(Array $array);
}