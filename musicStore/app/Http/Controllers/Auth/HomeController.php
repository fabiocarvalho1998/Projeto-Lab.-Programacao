<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;


class HomeController extends Controller{

    public function index(){

        return view('pages.home');

    }


    public function show_produto_by_categoria($cat_id) {
        $produto_by_categoria=DB::table('produtos')
            ->join('categorias','produtos.cat_id','=','categorias.cat_id')
            ->join('marcas', 'produtos.m_id','=','marcas.m_id')
            ->select('produtos.*','categorias.cat_name','marcas.m_name','marcas.m_id','categorias.cat_id')
            ->where('produtos.cat_id',$cat_id)
            ->where('produtos.publication_status',1)
            ->limit(18)
            ->get();


        $manage_produtos_by_categoria=view('pages.categoria_by_produto')->with('produto_by_categoria',$produto_by_categoria);
        return view('layout')->with('pages.categoria_by_produto',$manage_produtos_by_categoria );
        //return view('pages.home');
    }
    public function show_produto_by_marca($m_id) {
        $produto_by_marca=DB::table('produtos')
            ->join('marcas', 'produtos.m_id','=','marcas.m_id')
            ->join('categorias','produtos.cat_id','=','categorias.cat_id')
            ->select('produtos.*','categorias.cat_name','marcas.m_name','marcas.m_id','categorias.cat_id')
            ->where('produtos.m_id',$m_id)
            ->where('produtos.publication_status',1)
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
