<?php

namespace App\Http\Controllers;

use App\Models\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (Auth::check()) {
            $id_main =  Auth::user()->id;

            
            $ip = request()->ip();
            $date = date('Y-m-d');

            $coun_v = DB::table("visitors")
            ->where([ ['v_ip', '=', $ip], ['v_date', '=',$date ], ['v_sort', '=',1 ] ])
            ->count();

            if ($coun_v == 0) {
                \App\Models\visitor::create([
                    'v_ip' => $ip,
                    'v_date' => $date,
                    'v_user_id' => 1,
                    'v_sort' => 1,
                ]);
            }
            
        }else {
            $id_main =  0;
        }
        
        $count_users = DB::table("users")->where('id','!=',$id_main)->count();
        
        $all_users = DB::table('users')->where('id','!=',$id_main)->orderBy('id','desc')->limit(10)->get();
        


        if ($count_users != 0) {
     
            $ip = request()->ip();
            $date = date('Y-m-d');

            $coun_v = DB::table("visitors")
            ->where([ ['v_ip', '=', $ip], ['v_date', '=',$date ], ['v_sort', '=',1 ] ])
            ->count();

            if ($coun_v == 0) {
                \App\Models\visitor::create([
                    'v_ip' => $ip,
                    'v_date' => $date,
                    'v_user_id' => 1,
                    'v_sort' => 1,
                ]);
            }

        }



        return view('pages.index',compact('all_users','count_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
     * @param  \App\Models\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontend $frontend)
    {
        //
    }

    public function switch(REQUEST $request , $locale)
    {
        session(['APP_LOCALE'=>$locale]);

        return redirect()->back();
    }

    
}
