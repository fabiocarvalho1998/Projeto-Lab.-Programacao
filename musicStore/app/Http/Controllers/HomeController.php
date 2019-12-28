<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;


class HomeController extends Controller{

    public function index(){

        $this->AdminAuthCheck();
        $all_produtos_publicados=DB::table('produtos')

            ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
            ->join('marcas','produtos.m_id','=','marcas.m_id')
            ->select('produtos.*','categorias.cat_name','marcas.m_name')

            ->get();


        $manage_produtos_publicados=view('pages.home')->with('all_produtos_publicados',$all_produtos_publicados);
        return view('layout')->with('pages.home',$manage_produtos_publicados);
        //return view('pages.home');
    }
}
