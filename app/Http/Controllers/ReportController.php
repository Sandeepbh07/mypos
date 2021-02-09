<?php

namespace App\Http\Controllers;
use App\Purchase;
use App\Sales;
use App\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function viewplreport(){
        $totalpurcahse=Purchase::all()->sum('total_amount');
        $transaction=Transaction::all();
    $totalsale=$transaction->sum('total');
    $pl=$totalpurcahse-$totalsale;
      return view('admin.pages.reports.p&l',compact('totalpurcahse','totalsale','pl'))  ;
    }

    public function purchasereport(){
        $purchase=Purchase::all();
        $totalquantity=$purchase->sum('quantity');
        $totalpurchase=$purchase->sum('total_amount');
        $amtpaid=$purchase->sum('amount_paid');
        $remamt=$purchase->sum('remaining_amount');

        return view('admin.pages.reports.purchase',compact('totalpurchase','amtpaid','remamt','totalquantity'));
    }

    public function salereport(){
 
        $sale=Transaction::all();
        $totalquantity=Sales::all()->sum('quantity');
        $totalsale=$sale->sum('total');
        $amtpaid=$sale->sum('amount_paid');
        $remamt=$sale->sum('remaining_amount');

        return view('admin.pages.reports.sale',compact('totalsale','amtpaid','remamt','totalquantity'));
    }

}
