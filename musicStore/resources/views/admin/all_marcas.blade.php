@extends('admin_layout')
@section('admin_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <p class="alert-success">
        <?php
        $msg=Session::get('message');
        if($msg){
            echo $msg;
            Session::put('message',null);
        }
        ?>
    </p>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Dados</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID da Marca</th>
                        <th>Nome da Marca</th>
                        <th>Descrição da Marca</th>
                        <th>Estado (Status)</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    @foreach($all_marcas_data as $marca)
                        <tbody>
                        <tr>
                            <td>{{$marca->m_id}}</td>
                            <td class="center">{{$marca->m_name}}</td>
                            <td class="center">{{$marca->m_description}}</td>
                            <td class="center">
                                @if($marca->publication_status==1)
                                    <span class="label label-success">Ativo</span>
                                @else
                                    <span class="label label-danger">Inativo</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($marca->publication_status==1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_marca/'.$marca->m_id)}}">
                                        <i class="halflings-icon thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_marca/'.$marca->m_id)}}">
                                        <i class="halflings-icon thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{URL::to('/edit_marca/'.$marca->m_id)}}">
                                    <i class="halflings-icon edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete_marca/'.$marca->m_id)}}" id="delete">
                                    <i class="halflings-icon trash"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

    <span>{{$all_marcas_data->links()}}</span>
@endsection