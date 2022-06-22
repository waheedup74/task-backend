<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\AttachProduct;
use App\Models\User;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        //Count of all active and verified users
        $activeVerified = User::where('verified_status','1')->where('active_status','1')->count();

        //Count of active and verified users who have attached active products
        $attachActiveVerified = AttachProduct::whereHas('user', function ($query) {
        $query->where('verified_status','1');
        $query->where('active_status','1');
        })->count(); 

        //Count of all active products (just from products table).
        $activeProduct= Product::where('status','1')->count();

        //Count of active products which don't belong to any user
        $notbelonguser = Product::doesntHave('attactproducts.user')->where('status','1')->count();

        //Amount of all active attached products
        $amountactiveattachedproducts = Product::join('attach_products', 'attach_products.product_id', '=', 'products.id')
           ->where('products.status', '=', '1')
           ->sum('products.amount');

        

        //Summarized price of all active attached products
        $summarizedprice = Product::join('attach_products', 'attach_products.product_id', '=', 'products.id')
           ->where('products.status', '=', '1')
           ->get([DB::raw('(products.amount * attach_products.quantity) as total')])
           ->sum('total');

        //Summarized prices of all active products per user
        $summarizedpriceuser = User::Has('attactuser')->with('attactuser','attactuser.product')->whereHas('attactuser.product', function ($query) {
                $query->where('status','1');
                })->get();


        //Exchange rates
        $rates=Currency::rates()->latest()->base('EUR')->round(2)->get();

        return view('welcome',compact('activeVerified','activeProduct','attachActiveVerified','summarizedprice','amountactiveattachedproducts','summarizedpriceuser','notbelonguser','rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
