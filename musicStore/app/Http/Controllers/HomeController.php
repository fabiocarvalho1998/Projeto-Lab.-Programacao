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

    public function show_produto_by_categoria($cat_id) {
        $produto_by_categoria=DB::table('produtos')

         ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
         ->select('produtos.*','categorias.cat_name')
         ->where('cat_id',$cat_id)
         ->where('produto.publication_status',1)
         ->limit(18)

           ->get();


        $manage_produtos_by_categoria=view('pages.categoria_by_produto')->with('produto_by_categoria',$produto_by_categoria);
        return view('layout')->with('pages.categoria_by_produto',$manage_produtos_by_categoria );
        //return view('pages.home');
    }
    public function show_produto_by_marca($m_id) {
        $produto_by_marca=DB::table('produtos')

            ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
            ->select('produtos.*','categorias.cat_name')
            ->where('m_id',$m_id)
            ->where('produto.publication_status',1)
            ->limit(18)

            ->get();


        $manage_produtos_by_marca=view('pages.marca_by_produto')->with('produto_by_marca',$produto_by_marca);
        return view('layout')->with('pages.marca_by_produto',$manage_produtos_by_marca );
        //return view('pages.home');
    }

    public function produto_detalhes_by_id($p_id){
        $produto_by_detalhes=DB::table('produtos')

            ->join('categorias', 'produtos.cat_id','=','categorias.cat_id')
            ->join('marcas','produtos.m_id','=','marcas.m_id')
            ->select('produtos.*','categorias.cat_name','marcas.m_name')
            ->where('produtos.p_id',$p_id)
            ->where('produtos.publication_status',1)
            ->first();

        $manage_produtos_by_detalhes=view('pages.detalhes_produtos')->with('produto_by_detalhes',$produto_by_detalhes);
        return view('layout')->with('pages.detalhes_produtos',$manage_produtos_by_detalhes );
        //return view('pages.home');
    }
}
