<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    public function add_to_carrinho(Request $request){
        $qt=$request->qt;
        $produto_id=$request->p_id;
        $produto_info=DB::table('produtos')
                ->where('p_id',$produto_id)
                ->first();


                echo "<pre>";
                print_r($produto_info);
                echo "</pre>";


    }
}
