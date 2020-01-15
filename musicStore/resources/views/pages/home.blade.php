@extends('layout')
@section('content')
    <h2 class="title text-center">Produtos Disponíveis</h2>
    <?php
     foreach ($all_produtos_publicados as $published_produtos){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to($published_produtos->p_image)}}"style="height: 300px" alt="" />
                    <h2>{{$published_produtos->p_price }}€</h2>
                    <p>{{$published_produtos->p_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{$published_produtos->p_price }}€</h2>
                        <a href="{{URL::to('/view_produto/'.$published_produtos->p_id)}}"><p>{{$published_produtos->p_name}}</p> <i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{URL::to('/produto_by_marca',$published_produtos->m_id)}}"><i class="fa fa-plus-square"></i>{{$published_produtos->m_name}}</a></li>
                    <li><a href="{{URL::to('/produto_by_categoria',$published_produtos->cat_id)}}"><i class="fa fa-plus-square"></i>{{$published_produtos->cat_name}}</a></li>
                    <li><a href="{{URL::to('/view_produto/'.$published_produtos->p_id)}}"><p><i class="fa fa-plus-square"></i>Ver Produto</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
    <span>{{$all_produtos_publicados->links()}}</span>
@endsection
