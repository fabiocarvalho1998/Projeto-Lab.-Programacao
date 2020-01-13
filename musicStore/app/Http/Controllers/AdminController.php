<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;


session_start();
class AdminController extends Controller{

    public function index(){
        return view('admin_login');
    }



    public function dashboard(Request $request){
        $adm_email=$request->adm_email;
        $adm_password=md5($request->adm_password);
        $res=DB::table('admin')->where('adm_email',$adm_email)
            ->where('adm_password',$adm_password)
            ->first();
        if($res){
            Session::put('adm_name',$res->adm_name);
            Session::put('adm_id',$res->adm_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Email ou Palavra-Passe estão incorretos!');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        Session::flush();
       return Redirect::to('/admin');
    }
}
