@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Sub-Categorias</a>
            </li>
            <li class="breadcrumb-item active">Sub-Categorias</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Lista
                <a class="createButton ml-5" href="{{ route('sub.create') }}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Agregar'))</a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categoria</th>         
                               
                                <th>Nombre</th>                                
                                <th>Descripcion</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($aSub))
                            <?php $i=0; ?>
                            @foreach($aSub as $oSub)
                    
                            <tr>
                      
                                <td>{{ $oSub->id }}</td>
                                <td>{{ $oSub->category_id }}</td>
                                <td>{{ $oSub->name }}</td>
                                
                                <td>{{ $oSub->description }}</td>
                                
                                <td><a class="btn btn-primary btn-circle" href="{{action('admin\SubController@edit', $oSub->id)}}"><i class="fa fa-list"></i></a></td>
                              
                                <td>
                                <form id="deleteForm_{{$oSub->id}}" action="{{action('admin\SubController@destroy', $oSub->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$oSub->id}});"><i class="fa fa-times"></i></button>
                                    </form>           
                                </td>
                               
                              
                            </tr>
                            <?php //$i++; ?>   
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © BMC 2019</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    @include('layouts.modals')

</div>

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

@endsection