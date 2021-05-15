<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sales')
        ->leftJoin('customers', 'sales.customer_id', '=', 'customers.id')
        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
        ->select('sales.*', 'customers.first_name as customer_name', 'customers.id as customer_id', 'products.name as product_name', 'products.id as product_id')
        ->latest()
        ->paginate(15);
    
        return view('sale.index',compact('data'))
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
        return view('sale.create',['product' => $product, 'customer' => $customer
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
            'sales_status' => 'required',
            'sales_date' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]);
    
        Sale::create
        
        ($request->all());
     
        return redirect()->route('sales.index')
                        ->with('success','Sales is added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('sale.edit',['product' => $product, 'customer' => $customer, 'sale' => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'sales_status' => 'required',
            'sales_date' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]); 
        $sale->update($request->all());
    
        return redirect()->route('sales.index')
                        ->with('success','Sale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
    
        return redirect()->route('sales.index')
                        ->with('success','Sale deleted successfully');
    }
}
