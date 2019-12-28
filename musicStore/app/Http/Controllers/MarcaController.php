<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class MarcaController extends Controller
{

    public function index(){
        return view('admin.add_marca');
    }

    public function save_marca(Request $req){
        $data=array();
        $data['m_id']=$req->m_id;
        $data['m_name']=$req->m_name;
        $data['m_description']=$req->m_description;
        $data['publication_status']=$req->publication_status;

        DB::table('marcas')->insert($data);
        Session::put('message','Marca adicionada com sucesso!');
        return Redirect::to('/add_marca');
    }

    public function all_marcas(){
        $all_marcas_data=DB::table('marcas')->get();
        $manage_marca=view('admin.all_marcas')->with('all_marcas_data',$all_marcas_data);

        return view('admin_layout')->with('admin.all_marcas',$manage_marca);
    }

    public function unactive_marca($m_id){
        DB::table('marcas')
            ->where('m_id',$m_id)
            ->update(['publication_status'=>0]);

        Session::put('message','Marca '.$m_id.' Desativada!');
        return Redirect::to('/all_marcas');
    }

    public function active_marca($m_id){
        DB::table('marcas')
            ->where('m_id',$m_id)
            ->update(['publication_status'=>1]);
        Session::put('message','Marca '.$m_id.' Ativada!');
        return Redirect::to('/all_marcas');
    }

    public function edit_marca($m_id){
        $marca_data=DB::table('marcas')
            ->where('m_id',$m_id)
            ->first();
        $marca_data=view('admin.edit_marca')->with('marca_data',$marca_data);

        return view('admin_layout')->with('admin.edit_marca',$marca_data);
    }

    public function update_marca(Request $req,$m_id){
        $data=array();
        $data['m_name']=$req->m_name;
        $data['m_description']=$req->m_description;
        DB::table('marcas')
            ->where('m_id',$m_id)
            ->update($data);
        Session::get('message','Marca'.$m_id.' editada com sucesso!');
        return Redirect::to('all_marcas');
    }

    public function delete_marca($m_id){
        DB::table('marcas')
            ->where('m_id',$m_id)
            ->delete();
        Session::get('message','Marca apagada com sucesso!');
        return Redirect::to('all_marcas');
    }
}
