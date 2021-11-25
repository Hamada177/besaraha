<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (DB::table("users")->where('id',$id)->count() > 0) {

            if ($id == Auth::user()->id ) {

                $all_users = DB::table("users")->where('id','!=',Auth::user()->id)->get();
                $count_users = DB::table("users")->where('id','!=',Auth::user()->id)->count();
                
                return view('home',compact('all_users','count_users'));
                
            }else {
                
                $user_profile = DB::table("users")->where("id", $id)->first();
                $all_users = DB::table("users")
                ->where([ ['id', '!=', Auth::user()->id], ['id', '!=', $id] ])
                ->get();
               
                $count_users = DB::table("users")
                ->where([ ['id', '!=', Auth::user()->id], ['id', '!=', $id] ])
                ->count();
               
                return view('pages.profile',compact('user_profile','all_users','count_users'));
            }
               
        }else {
            return view('home');
        }
       
       
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
