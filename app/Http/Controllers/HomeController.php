<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = DB::table("users")->where('id','!=',Auth::user()->id)->get();
        $count_users = DB::table("users")->where('id','!=',Auth::user()->id)->count();
        
        return view('home',compact('all_users','count_users'));
    }

    public function handleAdmin()
    {
        return view('handleAdmin');
    }    



    
}
