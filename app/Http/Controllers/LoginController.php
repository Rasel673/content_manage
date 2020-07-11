<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;

class LoginController extends Controller
{
    public function loginIndex(){
        return view('admin.login');
    }
public function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/Login');
}
    public function onLogin(Request $request){
        $name=$request->input('name');
        $password=$request->input('password');

        $result=LoginModel::where(['name'=>$name,'password'=>$password])->count();
        if($result){
          $request->session()->put('name',$name);
         return 1;
        }else{
              return 0;
        }
    }
}
