<?php

namespace App\Http\Controllers;
use App\Customers;
use App\Http\Interfaces\CustomerInterface;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected $customint;
    public function __construct(CustomerInterface $customint){
        $this->customint=$customint;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=$this->customint->index();
        return view('admin.pages.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->name) && count(explode(" ",$request->name))==2)
        {
        $uniqueid= $request->name?explode(" ",$request->name)[1].'-'.rand(1,3000):rand(1,3000);
        $check=Customers::where('cuid',$uniqueid)->first();
        if($check)
        {
            $uniqueid= $request->name?explode(" ",$request->name)[1].'-'.rand(1,3000):rand(1,3000);  
        }
        $request['cuid']= $uniqueid;
  
        $this->customint->store($request);
    }
        return redirect('customers');
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
        $customer=$this->customint->edit($id);
        return view('admin.pages.customer.edit',compact('customer'));
    }
public function getbyuserid($id)
{
return   $this->customint->getbyuserid($id);
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->customint->update($request->all(),$id);
        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->customint->destroy($id);
        return redirect('customers');
    }
}
