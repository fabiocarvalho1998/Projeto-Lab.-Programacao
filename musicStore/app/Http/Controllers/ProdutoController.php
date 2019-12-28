<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProdutoController extends Controller
{
    public function index(){
        return view('admin.add_produto');
    }
    public function all_produto(){
        $all_produtos_data=DB::table('produtos')

            ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
            ->join('marcas','produtos.m_id','=','marcas.m_id')

            ->get();

//        echo "<pre>";
//        print_r($all_produtos_data);
//        echo"</pre>";
//        exit();

        $manage_produtos=view('admin.all_produtos')->with('all_produtos_data',$all_produtos_data);
        return view('admin_layout')->with('admin.all_produtos',$manage_produtos);
    }
    public function save_produto(Request $request){
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
            $img_name=str_random(20);
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
}
