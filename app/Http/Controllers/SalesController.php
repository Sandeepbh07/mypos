<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use App\Http\Interfaces\SalesInterface;
use App\Http\Interfaces\StockInterface;
use App\Sales;
use App\Transaction;
use App\User;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $salesint,$stockint;
    public function __construct(SalesInterface $salesint,StockInterface $stockint){
        $this->salesint=$salesint;
        $this->stockint=$stockint;
    }
    public function index()
    {
        $sales=$this->salesint->index();
        return view('admin.pages.sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addsale(Request $request)
    {

       $user=Customers::find($request->user_id);
       if($user)
       {
           $transaction=$user->transaction()->create($request->all());


           foreach($request->product_id as $index=>$product)
           {

            $transaction->sales()->create([
                
'quantity'=>$request['quantity'][$index],
'discount'=>$request['discount'][$index],
'vat'=>$request['vat'][$index],
'price'=>$request['price'][$index],
'product_id'=>$product


            ]);
            $this->stockint->deleteStock($product,$request['quantity'][$index]);
           }

        $sales=Sales::where('transaction_id',$transaction->id)->with('product')->get();
  return view('bill',compact('sales','transaction'));
       }

    }
    
}
