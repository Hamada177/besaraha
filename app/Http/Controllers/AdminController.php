<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $date = date('Y-m-d');
        $coun_v = DB::table("visitors")->count();
        $today_v = DB::table("visitors")->where('v_date','=',$date)->count();


        $all_users = DB::table("users")->where('id','!=',1)->orderBy('id','desc')->limit(50)->get();
       
        $count_users = DB::table("users")->where('id','!=',1)->count();
        $count_msgs = DB::table("sends")->count();

        $date = date('Y-m-d');
        $today_users = DB::table("users")->where('user_date','=',$date )->where('id','!=',1)->count();
        $today_msgs = DB::table("sends")->where('send_date','=',$date )->count();
        
        return view('admin.index',
            compact(
                'all_users',
                'count_users',
                'count_msgs',
                'today_users',
                'today_msgs',
                'coun_v',
                'today_v'
            ));
    }
}
