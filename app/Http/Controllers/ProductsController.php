<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Interfaces\ProductInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\SubcategoryInterface;

class ProductsController extends Controller
{
    protected $productint,$catint,$subcatint;
   

    public function __construct(ProductInterface $productint, CategoryInterface $catint,SubcategoryInterface $subcatint )
    {
       $this->productint=$productint;
       $this->catint=$catint;
       $this->subcatint=$subcatint;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products= $this->productint->index();
     

     return view('admin.pages.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category=$this->catint->index();
       $subcategory=$this->subcatint->index();
     return view('admin.pages.products.create',compact('category','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $product=$this->productint->store($request);
        //  $product->stock()->create($request->all());
        return redirect('products');
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
        return $this->productint->show($id);
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
        $category=$this->catint->index();
        $subcategory=$this->subcatint->index();
        $products=$this->productint->edit($id);
        return view('admin.pages.products.edit',compact('products','category','subcategory'));
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
        // $product->stock()->create($request->all());
        $this->productint->update($request->all(),$id);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryint->destroy($id);
        return redirect('categories');
    }

    public function search(Request $request)
    {
      return $this->productint->search($request->searched);
    
    }

    
}
