<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Music Store</title>
    <link href="{{asset("frontend/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/prettyPhoto.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/price-range.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/responsive.css")}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="frontend/js/html5shiv.js"></script>
    <script src="frontend/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{URL::to("images/ico/favicon.ico")}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to("frontend/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to("frontend/images/ico/apple-touch-icon-114-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to("frontend/images/ico/apple-touch-icon-72-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to("frontend/images/ico/apple-touch-icon-57-precomposed.png")}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/')}}"><img src="{{URL::to('frontend/images/home/musicStore.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{URL::to('/admin')}}"><i class="fa fa-lock"></i> Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Product Details</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Cart</a></li>
                                    <li><a href="{{URL::to('/admin')}}">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->


<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                            $all_published_slider=DB::table('slider')
                                ->where('publication_status',1)
                                ->get();

                            $i=1;
                            foreach ($all_published_slider as $slider){
                                if($i==1){
                        ?>
                        <div class="item active">
                            <?php  }else{ ?>
                                <div class="item">
                            <?php } ?>
                            <div class="col-sm-11">
                                <img src="{{URL::to($slider->slide_image)}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->


<section>
    <sec class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Categorias</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                        <?php
                                $all_published_category=DB::table('categorias')
                                                        ->where('publication_status',1)
                                                        ->get();
                                foreach ($all_published_category as $cat){?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="{{URL::to('/produto_by_categoria',$cat->cat_id)}}">{{$cat->cat_name}}</a></h4>
                                    </div>
                                </div>
                        <?php } ?>

                    </div><!--/category-products-->

                        <br>
                    </div>
                    <div class="brands_products"><!--brands_products-->
                        <h2>Marcas</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php
                                $all_published_marcas=DB::table('marcas')
                                    ->where('publication_status',1)
                                    ->get();
                                foreach ($all_published_marcas as $m){?>
                                <li><a href="{{URL::to('/produto_by_marca',$m->m_id)}}"> {{$m->m_name}}</a></li>
                                    <?php } ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @yield('content')
                </div>
            </div>
        </div>
        </div>
    </sec>
</section>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright 2020 © Fábio Carvalho & Josué Braz, todos os direitos reservados.  <br>Template 2013 E-SHOPPER Inc.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="{{asset("frontend/js/jquery.js")}}"></script>
<script src="{{asset("frontend/js/bootstrap.min.js")}}"></script>
<script src="{{asset("frontend/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("frontend/js/price-range.js")}}"></script>
<script src="{{asset("frontend/js/jquery.prettyPhoto.js")}}"></script>
<script src="{{asset("frontend/js/main.js")}}"></script>
</body>
</html>
