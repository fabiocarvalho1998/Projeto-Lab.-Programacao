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
        $all_category_data=DB::table('categorias')->get();
        $manage_category=view('admin.all_category')->with('all_category_data',$all_category_data);

        return view('admin_layout')->with('admin.all_category',$manage_category);
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

    public function unactive_category($cat_id){
        DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->update(['publication_status'=>0]);

        Session::put('message','Categoria '.$cat_id.' Desativada!');
        return Redirect::to('/all_category');
    }

    public function active_category($cat_id){
        DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->update(['publication_status'=>1]);
        Session::put('message','Categoria '.$cat_id.' Ativada!');
        return Redirect::to('/all_category');
    }

    public function edit_category($cat_id){
        $category_data=DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->first();
        $category_data=view('admin.edit_cat')->with('category_data',$category_data);

        return view('admin_layout')->with('admin.edit_cat',$category_data);

    }
}
