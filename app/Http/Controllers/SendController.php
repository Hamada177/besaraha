<?php

namespace App\Http\Controllers;

use view;
use visitor;
use App\User;
use App\Models\send;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {

        $ip = request()->ip();
        $date = date('Y-m-d');

            if (Auth::check()) {
                $id_main =  Auth::user()->id;
            }else {
                $id_main =  0;
            }

            if (DB::table("users")->where('username',$username)->count() > 0) {

                $user = DB::table("users")->where("username", $username)->first();

                $all_users = DB::table("users")
                ->where([ ['id', '!=',$id_main], ['username', '!=', $username] ])
                ->get();
                
                $count_users = DB::table("users")
                ->where([ ['id', '!=',$id_main], ['username', '!=', $username] ])
                ->count();

                $user_id = $user->id;
        
                $msgs = DB::table("sends")
                ->where([ ['user_id', '=', $user_id], ['status', '=', 1] ])
                ->orderBy('id','desc')->paginate(5);

                $count = DB::table("sends")
                ->where([ ['user_id', '=', $user_id], ['status', '=', 1] ])
                ->count();

                $coun_v = DB::table("visitors")
                ->where([ ['v_ip', '=', $ip], ['v_date', '=',$date ], ['v_user_id', '=',$user_id ], ['v_sort', '=',0 ] ])
                ->count();

                if ($coun_v == 0) {
                    \App\Models\visitor::create([
                        'v_ip' => $ip,
                        'v_date' => $date,
                        'v_user_id' => $user_id,
                        'v_sort' => 0,
                    ]);
                }

                $coun_v_link = DB::table("visitors")
                ->where([ ['v_user_id', '=',$user_id ], ['v_sort', '=',0 ] ])
                ->count();
             
                return view('pages.send',compact('user','msgs','count','all_users','count_users','coun_v_link'));


            }else {

                if (Auth::check()) {
                    $id_main =  Auth::user()->id;
                }else {
                    $id_main =  0;
                }
                
                $all_users = DB::table('users')->where('id','!=',$id_main)->orderBy('id','desc')->limit(10)->get();
                $count_users = DB::table("users")->where('id','!=',$id_main)->count();
                
                return view('/pages.index',compact('all_users','count_users'));
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
    public function store(Request $request){
       

        $validatedData = $request->validate([
            'message' => 'required|max:999|min:4',
            'user_id' => 'required',
        ],[

            'message.required' =>'messages.valid_textarea',
            'message.min' =>'messages.valid_textarea_min',
            'message.max' =>'messages.valid_textarea_max',


        ]);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('uploads/sends/',$filename);

            send::create([
                'message' => $request->message,
                'user_id' => $request->user_id,
                'image' => $filename,
                'status' => 0,


            ]);
            session()->flash('Add', 'messages.success_send_img');
            return redirect()->back();


        }else {
            send::create([
                'message' => $request->message,
                'user_id' => $request->user_id,
                'status' => 0,

            ]);
            session()->flash('Add', 'messages.success_send');
            return redirect()->back();
        }


        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\send  $send
     * @return \Illuminate\Http\Response
     */
    public function show(send $send)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\send  $send
     * @return \Illuminate\Http\Response
     */
    public function edit(send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\send  $send
     * @return \Illuminate\Http\Response
     */
    public function destroy(send $send)
    {
        //
    }

    

}
