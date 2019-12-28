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
            <a href="#">Adicionar Marca</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Adicionar Marca</h2>
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
                <form class="form-horizontal" action="{{URL::to('/save_marca')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">Nome da Marca</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="m_name" required="" >
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Descrição da Marca</label>
                            <div class="controls">
                                <textarea class="cleditor" name="m_description" rows="3" required=""></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Estado de Publicação</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Adicionar Marca</button>
                            <button type="reset" class="btn">Cancelar</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection