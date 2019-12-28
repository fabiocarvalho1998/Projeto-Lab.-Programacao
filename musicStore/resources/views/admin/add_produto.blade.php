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
            <a href="#">Adicionar Produto</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Adicionar Produto</h2>
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
                <form class="form-horizontal" action="{{URL::to('/save_produto')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">Nome do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_name" required="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Categoria do Produto</label>
                            <div class="controls">
                                <select id="selectError3" name="cat_id">
                                    <option>Selecionar Categoria</option>
                                    <?php
                                    $all_published_category=DB::table('categorias')
                                        ->where('publication_status',1)
                                        ->get();
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
                                    <option>Selecionar Marca</option>
                                    <?php
                                    $all_published_marcas=DB::table('marcas')
                                        ->where('publication_status',1)
                                        ->get();
                                    foreach ($all_published_marcas as $m){?>
                                    <option value="{{$m->m_id}}">{{$m->m_name}}</option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Curta Descrição do Produto</label>
                            <div class="controls">
                                <textarea class="cleditor" name="p_short_description" rows="3" required=""></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Descrição Completa do Produto</label>
                            <div class="controls">
                                <textarea class="cleditor" name="p_long_description" rows="3" required=""></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Preço do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_price" required="" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Imagem do Produto</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="p_image" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Tamanho do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_size" required="" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Cor do Produto</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="p_color" required="" >
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Estado de Publicação</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Adicionar Produto</button>
                            <button type="reset" class="btn">Cancelar</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection