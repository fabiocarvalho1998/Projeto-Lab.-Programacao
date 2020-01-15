@extends('layout')
@section('content')
    <h2 class="title text-center">Produtos listados por categoria</h2>
    <?php
    foreach ($produto_by_categoria as $categoria_by_produto){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to($categoria_by_produto->p_image)}}"style="height: 300px" alt="" />
                    <h2>{{$categoria_by_produto->p_price }}€</h2>
                    <p>{{$categoria_by_produto->p_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{$categoria_by_produto->p_price }}€</h2>
                        <p>{{$categoria_by_produto->p_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>

            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{URL::to('/produto_by_marca',$categoria_by_produto->m_id)}}"><i class="fa fa-plus-square"></i>{{$categoria_by_produto->m_name}}</a></li>
                    <li><a href="{{URL::to('/produto_by_categoria',$categoria_by_produto->cat_id)}}"><i class="fa fa-plus-square"></i>{{$categoria_by_produto->cat_name}}</a></li>
                    <li><a href="{{URL::to('/view_produto/'.$categoria_by_produto->p_id)}}"><p><i class="fa fa-plus-square"></i>Ver Produto</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php } ?>
    <span>{{$produto_by_categoria->links()}}</span>
@endsection
