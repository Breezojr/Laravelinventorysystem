<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('stocks')
        ->leftJoin('stores', 'stocks.store_id', '=', 'stores.id')
        ->leftJoin('products', 'stocks.product_id', '=', 'products.id')
        ->select('stocks.*', 'stores.store_name as stores_store_name','stores.store_city as stores_store_city', 'stores.id as store_id', 'products.name as product_name','products.brand_name as products_brand_name', 'products.id as product_id')
        ->latest()
        ->paginate(15);
    
        return view('products.stock.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $store = Store::all();
        return view('products.stock.create',['product' => $product, 'store' => $store
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity'=> 'required',
        ]);
    
        Stock::create
        
        ($request->all());
     
        return redirect()->route('stocks.index')
                        ->with('success','Stock is added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('products.stock.show',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $product = Product::all();
        $store = Store::all();
        return view('products.stock.edit',['product' => $product, 'store' => $store, 'stock' => $stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'quantity'=> 'required',
        ]); 
        $stock->update($request->all());
    
        return redirect()->route('stocks.index')
                        ->with('success','Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
    
        return redirect()->route('stocks.index')
                        ->with('success','Stock deleted successfully');
    }
}
