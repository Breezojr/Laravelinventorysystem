<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Store;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $data = DB::table('orders')
        ->leftJoin('stores', 'orders.store_id', '=', 'stores.id')
        ->leftJoin('customers', 'orders.customer_id', '=', 'customers.id') 
        ->leftJoin('employees', 'orders.employee_id', '=', 'employees.id')
        ->select('orders.*', 'stores.store_name as store_name', 'stores.id as store_id','customers.first_name as customer_name', 'customers.id as customer_id', 'employees.first_name as employee_name','employees.id as employee_id')
        ->latest()
        ->paginate(15);
    
        return view('order.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        $customer = Customer::all();
        $store = Store::all();
        return view('order.create',['employee' => $employee, 'store' => $store, 'customer' => $customer
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
            'order_status' => 'required',
            'order_date' => 'required',
            'required_date'=> 'required',
            'shipped_date' => 'required',
        ]);
    
        Order::create
        
        ($request->all());
     
        return redirect()->route('orders.index')
                        ->with('success','Order is added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customer = Customer::all();
        $employee = Employee::all();
        $store = Store::all();
        return view('order.edit',['employee' => $employee, 'store' => $store, 'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_status' => 'required',
            'order_date' => 'required',
            'required_date'=> 'required',
            'shipped_date' => 'required',
        ]); 
        $order->update($request->all());
    
        return redirect()->route('orders.index')
                        ->with('success','Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
    
        return redirect()->route('orders.index')
                        ->with('success','Order deleted successfully');
    }
}
