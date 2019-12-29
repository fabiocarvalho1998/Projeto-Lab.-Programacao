<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SliderController extends Controller
{
    public function index(){
        return view('admin.add_slider');
    }

    public function save_slider(Request $request){
        $data=array();
        $data['publication_status']=$request->publication_status;
        $img=$request->file('slide_image');
        if($img){
            $img_name=str_random(20);
            $ext=strtolower($img->getClientOriginalExtension());
            $img_full_name=$img_name.'.'.$ext;
            $upload_path='slider/';
            $img_url=$upload_path.$img_full_name;
            $success=$img->move($upload_path,$img_full_name);
            if($success){
                $data['slide_image']=$img_url;
                DB::table('slider')->insert($data);
                Session::put('message','Slider adicionado com sucesso!');
                return Redirect::to('/add_slider');
            }
        }


    }

    public function all_sliders(){

        $all_slider_data=DB::table('slider')->get();
        $manage_sliders=view('admin.all_sliders')->with('all_slider_data',$all_slider_data);

        return view('admin_layout')->with('admin.all_sliders',$manage_sliders);


    }
}
