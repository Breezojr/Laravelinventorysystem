<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    public function index()
    {
    
        $data = DB::table('products');
    
        return view('layouts.headers.cards',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }
}
