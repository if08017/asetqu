<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $users=User::orderBy('name', 'asc')->paginate(10);
    return view('kelola',['users'=>$users]);
  }
  public function user_add(Request $request){
    //dd($request);
    User::Create([
      'name' => $request->name,
      'username' => $request->username,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'remember_token' => $request->_token
    ]);
    return redirect('/kelola');
  }
  public function user_delete($id){
    User::destroy($id);
    return redirect('/kelola');
  }
}
