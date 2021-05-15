<?php

namespace App\Http\ViewComposers;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\View\View;

class ProductComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
    
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $products = Product::all();
        $employees = Employee::all();
        $sales = Sale::all();
        $stock = Stock::all();
        $view->with(['products' => $products, 'employees' => $employees, 'sales' => $sales, 'stock' => $stock]);
    }
}