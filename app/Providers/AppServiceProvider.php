<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\ProductInterface;
use App\Http\Repository\ProductRepository;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\SubcategoryInterface;
use App\Http\Repository\CategoryRepository;
use App\Http\Interfaces\SupplierInterface;
use App\Http\Repository\SupplierRepository;
use App\Http\Repository\SubcategoryRepository;
use App\Http\Interfaces\PurchaseInterface;
use App\Http\Repository\PurchaseRepository;
use App\Http\Interfaces\CustomerInterface;
use App\Http\Repository\CustomerRepository;
use App\Http\Interfaces\SalesInterface;
use App\Http\Repository\SalesRepository;
use App\Http\Interfaces\StockInterface;
use App\Http\Repository\StockRepository;
use App\Purchase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this-> ProductRepo(); //
       $this->CategoryRepo();
       $this->SubCategoryrepo();
       $this->SupplierRepo();
       $this->PurchaseRepo();
       $this->CustomerRepo();
       $this->SalesRepo();
       $this->StockRepo();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    public function ProductRepo(){

 $this->app->bind(ProductInterface::class,ProductRepository::class);
    }
    
    public function CategoryRepo(){

        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
           }

           public function SubCategoryrepo(){
              $this->app->bind(SubcategoryInterface::class,SubcategoryRepository::class);
           }
           public function SupplierRepo(){
            $this->app->bind(SupplierInterface::class,SupplierRepository::class);
           }
           public function PurchaseRepo(){
              $this->app->bind(PurchaseInterface::class,PurchaseRepository::class);
           }
           public function CustomerRepo(){
              $this->app->bind(CustomerInterface::class,CustomerRepository::class);
           }
           public function SalesRepo(){
              $this->app->bind(SalesInterface::class,SalesRepository::class);
           }
           public function StockRepo(){
            $this->app->bind(StockInterface::class,StockRepository::class);
           }
}
