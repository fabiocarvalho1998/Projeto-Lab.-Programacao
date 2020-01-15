<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProdutoController extends Controller
{


    public function AdminAuthCheck(){
        $admin_id=Session::get('adm_id');
        if($admin_id){
            return;
        }
        else{
            return Redirect::to('/admin')->send();
        }
    }

    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_produto');
    }

    public function all_produto(){
        $this->AdminAuthCheck();
        $all_produtos_data=DB::table('produtos')

            ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
            ->join('marcas','produtos.m_id','=','marcas.m_id')
            ->select('produtos.*','categorias.cat_name','marcas.m_name')
            ->paginate(5);

//        echo "<pre>";
//        print_r($all_produtos_data);
//        echo"</pre>";
//        exit();

        $manage_produtos=view('admin.all_produtos')->with('all_produtos_data',$all_produtos_data);
        return view('admin_layout')->with('admin.all_produtos',$manage_produtos);
    }
    public function save_produto(Request $request){
        $this->AdminAuthCheck();
        $data=array();
        $data['p_name']=$request->p_name;
        $data['cat_id']=$request->cat_id;
        $data['m_id']=$request->m_id;
        $data['p_short_description']=$request->p_short_description;
        $data['p_long_description']=$request->p_long_description;
        $data['p_price']=$request->p_price;
        $data['p_size']=$request->p_size;
        $data['p_color']=$request->p_color;
        $data['publication_status']=$request->publication_status;

        $img=$request->file('p_image');
        if($img){
            $img_name=str_random(10);
            $ext=strtolower($img->getClientOriginalExtension());
            $img_full_name=$img_name.'.'.$ext;
            $upload_path='image/';
            $img_url=$upload_path.$img_full_name;
            $success=$img->move($upload_path,$img_full_name);
            if($success){
                $data['p_image']=$img_url;
                DB::table('produtos')->insert($data);
                Session::put('message','Produto adicionado com sucesso!');
                return Redirect::to('/add_produto');
            }
        }

    }
    public function unactive_produto($p_id){
        $this->AdminAuthCheck();
        DB::table('produtos')
            ->where('p_id',$p_id)
            ->update(['publication_status'=>0]);

        Session::put('message','Produto '.$p_id.' Desativada!');
        return Redirect::to('/all_produtos');
    }

    public function active_produto($p_id){
        $this->AdminAuthCheck();
        DB::table('produtos')
            ->where('p_id',$p_id)
            ->update(['publication_status'=>1]);

        Session::put('message','Produto '.$p_id.' ativada!');
        return Redirect::to('/all_produtos');
    }

    public function delete_produto($p_id){
        $this->AdminAuthCheck();
        DB::table('produtos')
            ->where('p_id',$p_id)
            ->delete();
        Session::get('message','Produto apagado com sucesso!');
        return Redirect::to('/all_produtos');
    }
    public function edit_produto($p_id){
        $this->AdminAuthCheck();
        $produto_data=DB::table('produtos')
            ->where('p_id',$p_id)
            ->first();
        $produto_data=view('admin.edit_produto')->with('produto_data',$produto_data);

        return view('admin_layout')->with('admin.edit_produto',$produto_data);
    }

    public function update_produto(Request $req,$p_id){
        $data=array();
        $data['p_name']=$req->p_name;
        $data['cat_id']=$req->cat_id;
        $data['m_id']=$req->m_id;
        $data['p_short_description']=$req->p_short_description;
        $data['p_long_description']=$req->p_long_description;
        $data['p_price']=$req->p_price;
        $data['p_size']=$req->p_size;
        $data['p_color']=$req->p_color;
/*
        $img=$req->file('p_image');
            $img_name=str_random(10);
            $ext=strtolower($img->getClientOriginalExtension());
            $img_full_name=$img_name.'.'.$ext;
            $upload_path='image/';
            $img_url=$upload_path.$img_full_name;
            $img->move($upload_path,$img_full_name);

            $data['p_image'] = $img_url;*/
            DB::table('produtos')
                ->where('p_id',$p_id)
                ->update($data);
            Session::get('message','Produto'.$p_id.' editado com sucesso!');
            return Redirect::to('/all_produtos');

    }
}
