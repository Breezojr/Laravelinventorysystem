<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $population = Sale::select(
            DB::raw("MONTH(created_at) as months"),
            DB::raw("SUM(price * amount) as total")) 
        ->orderBy(DB::raw("MONTH(created_at)"))
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->get();

$res[] = ['months', 'total'];
foreach ($population as $key => $val) {
$res[++$key] = [$val->months, (int)$val->total];
}

        return view('dashboard')->with('population', json_encode($res));
    }

    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }

}
