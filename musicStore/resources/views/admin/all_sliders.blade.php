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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Slider</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>ID do Slider</th>
                        <th>Imagem do Slider</th>
                        <th>Estado (Status)</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    @foreach($all_slider_data as $sliders)
                        <tbody>
                        <tr>
                            <td>{{$sliders->slide_id}}</td>
                            <td><img src="{{URL::to($sliders->slide_image)}}" style="height: 80px; width: 200px;" ></td>
                            <td class="center">
                                @if($sliders->publication_status==1)
                                    <span class="label label-success">Ativo</span>
                                @else
                                    <span class="label label-danger">Inativo</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($sliders->publication_status==1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_slider/'.$sliders->slide_id)}}">
                                        <i class="halflings-icon thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_slider/'.$sliders->slide_id)}}">
                                        <i class="halflings-icon thumbs-up"></i>
                                    </a>
                                @endif

                                <a class="btn btn-danger" href="{{URL::to('/delete_slider/'.$sliders->slide_id)}}" id="delete">
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

@endsection
