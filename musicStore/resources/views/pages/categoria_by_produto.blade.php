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
            <?php
            $all_published_category=DB::table('categorias')
                ->where('publication_status',1)
                ->get();
            $all_published_marcas=DB::table('marcas')
                ->where('publication_status',1)
                ->get();
            foreach ($all_published_category as $cat){
                foreach ($all_published_marcas as $m){
                $x=0;
                if($cat->cat_id == $categoria_by_produto->cat_id && $m->m_id == $categoria_by_produto->m_id &&$x==0){?>

            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{URL::to('/produto_by_marca',$m->m_id)}}"><i class="fa fa-plus-square"></i>{{$categoria_by_produto->m_name}}</a></li>
                    <li><a href="{{URL::to('/produto_by_categoria',$cat->cat_id)}}"><i class="fa fa-plus-square"></i>{{$categoria_by_produto->cat_name}}</a></li>
                    <li><a href="{{URL::to('/view_produto/'.$categoria_by_produto->p_id)}}"><p>{{$categoria_by_produto->p_name}}"><i class="fa fa-plus-square"></i>Ver Produto</a></li>
                </ul>
            </div>
            <?php }} $x++; }?>
        </div>
    </div>

    <?php } ?>
    </div><!--features_items-->



                <div class="recommended_items"><!--recommended_items-->                </div>
            </div>
        </div>

        <h2 class="title text-center">recommended items</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend1.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend2.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend3.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend1.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend2.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to("frontend/images/home/recommend3.jpg")}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->

    </div>
    </div>
    </div>
    </section>
    </body>
    </html>

@endsection
