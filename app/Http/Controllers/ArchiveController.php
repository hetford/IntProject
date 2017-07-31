<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class ArchiveController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('SystemAdmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hrdocs = DB::table('documents')
            ->where('isDeleted',1)
            ->where('category', 'HR')
            ->get();
        
        $devdocs = DB::table('documents')
            ->where('isDeleted',1)
            ->where('category', 'Development')
            ->get();
        
       $paydocs = DB::table('documents')
            ->where('isDeleted',1)
            ->where('category', 'Payroll')
            ->get();
        
        return view('archive.index', compact('hrdocs', 'devdocs', 'paydocs'));
    }
}
