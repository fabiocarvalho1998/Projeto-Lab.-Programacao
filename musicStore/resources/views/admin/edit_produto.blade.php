@extends('admin_layout')
@section('admin_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Editar produto</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Editar produto</h2>
            </div>
            <p class="alert-success">
                <?php
                $msg=Session::get('message');
                if($msg){
                    echo $msg;
                    Session::put('message',null);
                }
                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" enctype='multipart/form-data' action="{{URL::to('/update_produto',$produto_data->p_id)}}" method="{{method_field('POST')}}"  >
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">Nome do produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_name" value="{{$produto_data
                                ->p_name}}"  >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Categoria do Produto</label>
                            <div class="controls">
                                <select id="selectError3" name="cat_id">

                                    <?php
                                    $all_published_category=DB::table('categorias')
                                        ->where('publication_status',1)
                                        ->get();
                                    foreach($all_published_category as $c){
                                        if($c->cat_id==$produto_data->cat_id){
                                            $cname=$c->cat_name;
                                        }
                                    }
                                    echo "<option value='$produto_data->cat_id'>$cname</option>";
                                    foreach ($all_published_category as $cat){?>
                                    <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Marca do Produto</label>
                            <div class="controls">
                                <select id="selectError3" name="m_id">
                                    <?php
                                    $all_published_marcas=DB::table('marcas')
                                        ->where('publication_status',1)
                                        ->get();
                                    foreach($all_published_marcas as $m){
                                        if($m->m_id==$produto_data->m_id){
                                            $mname=$m->m_name;
                                        }
                                    }
                                    echo "<option value='$produto_data->m_id'>$mname</option>";
                                    foreach ($all_published_marcas as $m){?>
                                    <option value="{{$m->m_id}}">{{$m->m_name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Curta Descrição do Produto</label>
                            <div class="controls">
                                <textarea class="cleditor" name="p_short_description" rows="3" required="">{{$produto_data
                                ->p_short_description}}</textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Descrição Completa do Produto</label>
                            <div class="controls">
                                <textarea class="cleditor" name="p_long_description" rows="3" required="">{{$produto_data
                                ->p_long_description}}</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Imagem do Produto</label>
                            <div class="controls">
                                <input class="input-file" name="p_image" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Preço do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_price" required="" value="{{$produto_data
                                ->p_price}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Tamanho do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_size" required="" value="{{$produto_data
                                ->p_size}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Cor do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_color" required="" value="{{$produto_data
                                ->p_color}}" >
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Editar produto</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    <link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://bootstrapmaster.com/" alt="Bootstrap Themes">creativeLabs</a></span>
        <span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co/" alt="Bootstrap Admin Templates">Metro</a></span>
    </p>

    <script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
    <script src='{{asset('backend/js/fullcalendar.min.js')}}'></script>
    <script src='{{asset('backend/js/jquery.dataTables.min.js')}}'></script>
    <script src="{{asset('backend/js/excanvas.js')}}"></script>
    <script src="{{asset('backend/js/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/js/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/js/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.chosen.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.cleditor.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.noty.js')}}"></script>
    <script src="{{asset('backend/js/jquery.elfinder.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.raty.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.iphone.toggle.js')}}"></script>
    <script src="{{asset('backend/js/jquery.uploadify-3.1.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.imagesloaded.js')}}"></script>
    <script src="{{asset('backend/js/jquery.masonry.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.knob.modified.js')}}"></script>
    <script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('backend/js/counter.js')}}"></script>
    <script src="{{asset('backend/js/retina.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>

@endsection
