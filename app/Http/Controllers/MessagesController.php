<?php

namespace App\Http\Controllers;

use App\send;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $count = DB::table("sends")->where('user_id','=',$id)->count();
     
        $msgs = DB::table("sends")->where('user_id', $id)->orderBy('id','desc')->paginate(8);
        return view('pages.msgs',compact('msgs','count'));
        
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
   
    public function admin_msgs(Request $request)
    {
        $id = $request->id;
        $count = DB::table("sends")->where('user_id','=',$id)->count();
        $user_up = DB::table('users')->where('id', '=', $id)->first();
     
        $msgs = DB::table("sends")->where('user_id', $id)->orderBy('id','desc')->paginate(8);
        return view('admin.msgs',compact('msgs','count','user_up'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request){

        $id = $request->id;
        $img = $request->img;

        $file_route = 'uploads/sends/'.$img;

        if (File::exists($file_route)) {
            File::delete($file_route);
        }

        $msg = DB::table('sends')->where('id', '=', $id);
        $msg->delete();
        return redirect()->back();

    }

    
    public function pub(Request $request){

        $id = $request->id;
        $status = $request->status;

        if ($status == 0) {
            $status = 1;

            $msg = DB::table('sends')->where('id', '=', $id);
            $msg->update([
                'status' => $status,
            ]);
            session()->flash('public','messages.done_public');
            return redirect()->back();

        }else {
            $status = 0;
            $msg = DB::table('sends')->where('id', '=', $id);
            $msg->update([
                'status' => $status,
            ]);
            session()->flash('public','messages.un_public');
            session()->flash('deleted','message deleted successfuly');

            return redirect()->back();

        }

       

        
    }

}
