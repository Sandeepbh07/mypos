<?php

namespace App\Http\Controllers;
use App\Http\Interfaces\PurchaseInterface;
use App\Http\Interfaces\SupplierInterface;
use App\Http\Interfaces\StockInterface;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $purchaseint,$suppint,$stockint;
   public function __construct(PurchaseInterface $purchaseint,SupplierInterface $suppint,StockInterface $stockint){
       $this->purchaseint=$purchaseint;
       $this->suppint=$suppint;
       $this->stockint=$stockint;
   }






    public function index()
    {
        $purchases=$this->purchaseint->index();
        return view('admin.pages.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=$this->suppint->index();
        return view('admin.pages.purchase.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->stockint->store($request);
        $this->purchaseint->store($request);
        return redirect('/purchases');
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
        $suppliers=$this->suppint->index();
        $purchase=$this->purchaseint->edit($id);
        return view('admin.pages.purchase.edit',compact('purchase','suppliers'));
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
        $this->purchaseint->update($request->all(),$id);
        return redirect('purchases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->purchaseint->destroy($id);
        return redirect('purchases');
    }
}
