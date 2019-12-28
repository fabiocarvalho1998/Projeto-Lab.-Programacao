<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CategoryController extends Controller
{

    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }

    public function all_category(){
        $this->AdminAuthCheck();
        $all_category_data=DB::table('categorias')->get();
        $manage_category=view('admin.all_category')->with('all_category_data',$all_category_data);

        return view('admin_layout')->with('admin.all_category',$manage_category);
    }

    public function save_category(Request $request){
        $data=array();
        $data['cat_id']=$request->cat_id;
        $data['cat_name']=$request->cat_name;
        $data['cat_description']=$request->cat_description;
        $data['publication_status']=$request->publication_status;

        DB::table('categorias')->insert($data);
        Session::put('message','Categoria adicionada com sucesso!');
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
        $this->AdminAuthCheck();
        $category_data=DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->first();
        $category_data=view('admin.edit_cat')->with('category_data',$category_data);

        return view('admin_layout')->with('admin.edit_cat',$category_data);
    }

    public function update_category(Request $req,$cat_id){

        $data=array();
        $data['cat_name']=$req->cat_name;
        $data['cat_description']=$req->cat_description;
        DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->update($data);
        Session::get('message','Categoria editada com sucesso!');
        return Redirect::to('all_category');
    }

    public function delete_category($cat_id){
        DB::table('categorias')
            ->where('cat_id',$cat_id)
            ->delete();
        Session::get('message','Categoria apagada com sucesso!');
        return Redirect::to('all_category');
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
