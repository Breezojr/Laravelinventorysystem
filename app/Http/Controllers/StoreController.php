<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Store::latest()->paginate(5);
    
        return view('products.store.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.store.create');
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
            'store_name' => 'required',
            'store_phone' => 'required',
            'store_email' => 'required',
            'store_street' => 'required',
            'store_city' => 'required', 
            'store_state' => 'required',
        ]);
    
        Store::create
        
        ($request->all());
     
        return redirect()->route('stores.index')
                        ->with('success','Store records updated succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('products.store.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('products.store.edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'store_name' => 'required',
            'store_phone' => 'required',
            'store_email' => 'required',
            'store_street' => 'required',
            'store_city' => 'required',
            'store_state' => 'required',

        ]);
    
        $store->update($request->all());
    
        return redirect()->route('stores.index')
                        ->with('success','Store updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
    
        return redirect()->route('stores.index')
                        ->with('success','Store deleted successfully');
    }
}
