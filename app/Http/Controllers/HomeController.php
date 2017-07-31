<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        
        if ($user->role == 'System Admin') {
            $hrdocs = DB::table('documents')
                ->where('isDeleted',0)
                ->where('category', 'HR')
                ->get();
        
            $devdocs = DB::table('documents')
                ->where('isDeleted',0)
                ->where('category', 'Development')
                ->get();
        
            $paydocs = DB::table('documents')
                ->where('isDeleted',0)
                ->where('category', 'Payroll')
                ->get();
        }
        else {
            $hrdocs = DB::table('documents')
            ->where('isDeleted',0)
            ->where('category', 'HR')
            ->where(function ($query) {
                $query->where('author', Auth::user()->id)
                      ->orwhere('active', 1);
            })->get();
        
        $devdocs = DB::table('documents')
            ->where('isDeleted',0)
            ->where('category', 'Development')
            ->where(function ($query) {
                $query->where('author', Auth::user()->id)
                      ->orwhere('active', 1); 
            })->get();
        
       $paydocs = DB::table('documents')
            ->where('isDeleted',0)
            ->where('category', 'Payroll')
             ->where(function ($query) {
                $query->where('author', Auth::user()->id)
                      ->orwhere('active', 1);
            })->get();   
        }
        
        return view('/home', compact('hrdocs', 'devdocs', 'paydocs'));
    }
}