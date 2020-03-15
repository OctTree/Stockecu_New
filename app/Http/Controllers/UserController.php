<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //


    
    // protected function validator(array $request)
    // {
    //     return Validator::make($request, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }


    public function index(){
        $users = DB::table('users')->join('roles', 'users.role_id', 'roles.id')
                                   ->select('users.*', 'roles.role_name')
                                   ->get();
        $roles = DB::table('roles')->get();
        return view('user_management')->with('users', $users)->with('roles', $roles);
    }
    public function addUser(Request $request){
        DB::table('users')->insert(['name'=>$request->username, 'email'=>$request->email, 'password'=>bcrypt($request->password), 'role_id'=>$request->role_id]);
        return 0;
    }

    public function editUser(Request $request){
        $users = DB::table('users')->where('id',$request->id)
                                    ->update(['name' => $request->username, 'email' => $request->email, 'password' => $request->password, 'role_id'=>$request->role_id]);
        return 0;
    }
    public function deleteUser(Request $request){
        DB::table('users')->where('id',$request->id)->delete();
        return 0;
    }
}
