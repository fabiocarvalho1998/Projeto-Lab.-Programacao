<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Request;


session_start();
    class SuperAdminController extends Controller {

        public function index(){
            $this->AdminAuthCheck();
            return view('admin.dashboard');
        }


        public function logout(){
        Session::flush();
        return redirect()::to('/admin');

}

    public function AdminAuthCheck(){
    $admin_id=Session::get('adm_id');
    if($admin_id){
        return;
    }
    else{
        return Redirect::to('/admin')->send();
    }
    }

}
