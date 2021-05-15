<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $data = DB::table('purchases')
        ->leftJoin('customers', 'purchases.customer_id', '=', 'customers.id')
        ->leftJoin('products', 'purchases.product_id', '=', 'products.id')
        ->select('purchases.*', 'customers.first_name as customer_name',  'customers.id as customer_id', 'products.name as product_name', 'products.id as product_id')
        ->latest()
        ->paginate(15);
    
        return view('purchase.index',compact('data'))
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
        $customer = Customer::all();
        return view('purchase.create',['product' => $product, 'customer' => $customer
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
            'purchase_status' => 'required',
            'purchase_date' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]);
    
        Purchase::create
        
        ($request->all());
     
        return redirect()->route('purchases.index')
                        ->with('success','Purchase is added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchase.show',compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('purchase.edit',['product' => $product, 'customer' => $customer, 'purchase' => $purchase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'purchase_status' => 'required',
            'purchase_date' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]); 
        $purchase->update($request->all());
    
        return redirect()->route('purchases.index')
                        ->with('success','Purchase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
    
        return redirect()->route('purchases.index')
                        ->with('success','Purchase deleted successfully');
    }
}
