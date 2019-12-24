<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.add_category');
    }

    public function all_category(){
        return view('admin.all_category');
    }

    public function save_category(Request $request){
        //return view('admin.save_category');
        $data=array();
        $data['cat_id']=$request->cat_id;
        $data['cat_name']=$request->cat_name;
        $data['cat_description']=$request->cat_description;
        $data['publication_status']=$request->publication_status;

        DB::table('categorias')->insert($data);
        Session::put('message','Category added successfully!');
        return Redirect::to('/add_category');
    }
}
