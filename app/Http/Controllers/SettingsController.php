<?php

namespace App\Http\Controllers;

use App\Models\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class SettingsController extends Controller
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
        //
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
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        session()->flash('password','show password box');
       
        $current_user = auth()->user();

        $this->validate($request, [
            'old_password' => 'required|min:8|max:99',
            'new_password' => 'required|min:8|max:99',
            're_password' => 'required|same:new_password',
        ]);

        if (Hash::check($request->old_password,$current_user->password)) {

            $current_user->update([
                'password' => bcrypt($request->new_password),
            ]);

            session()->flash('success_pass','settings.success_pass');
        }else {
            session()->flash('error_pass','settings.error_pass');
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [

            'name' => 'required|min:7|max:22',
            'phone' => 'required|min:6|max:15',
            'birthday' => 'required',
            'gender' => 'required',
            'brief' => 'required|min:10|max:255',
        ]);

        $users = DB::table("users")->where('id','=',$id);

        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('img/',$filename);

            $users->update([
                'birthday' => $request->birthday,
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'brief_about_me' => $request->brief,
                'pic' => $filename,
            ]);
        }else {
            $users->update([
                'birthday' => $request->birthday,
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'brief_about_me' => $request->brief,
            ]);
        }

       

        session()->flash('edit','settings.done');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(settings $settings)
    {
        //
    }
}
