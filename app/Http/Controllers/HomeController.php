<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Sales;
use App\Stock;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
   
    $totalpurcahse=Purchase::all()->sum('total_amount');

    $transaction=Transaction::all();
    $totalsale=$transaction->sum('total');
    $salesdue=$transaction->sum('remaining_amount');
    $purchase=Purchase::all();
    $amounttobepaidtotal=$purchase->sum('remaining_amount');
    $inventory=Stock::where('quantity','<=',20)->orderBy('quantity','asc')->limit(10)->with('product')->get();
    $remainingpurchase=Purchase::where('remaining_amount','!=',0)->groupBy('supplier_id')->orderBy('remaining_amount','desc')->limit(10)->with('supplier') ->selectRaw('*, sum(remaining_amount) as sum')->get();
    
 
    
    
    $remainingsale=Transaction::where('remaining_amount','!=',0)->groupBy('user_id')->orderBy('remaining_amount','desc')->with('customer')->limit(10)->selectRaw('*, sum(remaining_amount) as sum')->get();

          return view('admin.pages.home.homepage',compact('totalpurcahse','totalsale',
          'salesdue','amounttobepaidtotal','inventory','remainingpurchase','remainingsale'
          ));
    }

}
