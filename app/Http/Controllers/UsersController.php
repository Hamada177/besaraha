<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $all_users = DB::table("users")->where('id','!=',1)->orderBy('id','desc')->get();
       
        $count_users = DB::table("users")->where('id','!=',1)->count();
        
        return view('admin.users',compact('all_users','count_users'));
    }

 
    public function delete_user(Request $request){
       
        $id = $request->id;

        $user = DB::table('users')->where('id', '=', $id);
        $user->delete();
        return redirect()->back()->with('success_delete','user deleted successfully');
  
    }   
    
    public function update_user(Request $request){
       
        $id = $request->id;
        $user_up = DB::table('users')->where('id', '=', $id)->first();

        return view('admin.users_update',compact('user_up'));
  
    }

     
    public function update_form_user(Request $request){

        $id = $request->id;
        $user = DB::table('users')->where('id', '=', $id);
       
        $this->validate($request, [
            'name' => 'required|min:7|max:22',
            'phone' => 'required|min:6|max:15',
            'brief' => 'min:10|max:255',
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extintion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extintion;
            $file->move('img/',$filename);

            $user->update([
                'birthday' => $request->birthday,
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'brief_about_me' => $request->brief,
                'pic' => $filename,
            ]);
        }else {
            $user->update([
                'birthday' => $request->birthday,
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'brief_about_me' => $request->brief,
            ]);
        }

      
        return redirect()->back()->with('success','user updated successfuly');
        
  
    }

}
