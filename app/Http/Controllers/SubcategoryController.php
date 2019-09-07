<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\SubcategoryInterface;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    protected $subcategoryint;
      protected $categoryInterface;
    public function __construct(SubcategoryInterface $subcategoryint ,CategoryInterface $categoryInterface){
        $this->subcategoryint=$subcategoryint ;
        $this->categoryInterface=$categoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subcategories= $this->subcategoryint->index();
      return view('admin.pages.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=$this->categoryInterface->index();
        return view('admin.pages.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->subcategoryint->store($request);
        return redirect('subcategories');
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
        $category=$this->categoryInterface->index();
        $subcategory=$this->subcategoryint->edit($id);
        return view('admin.pages.subcategory.edit',compact('subcategory','category'));
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
        $this->subcategoryint->update($request->all(),$id);
        return redirect('subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subcategoryint->destroy($id);
        return redirect('subcategories');
    }
}
