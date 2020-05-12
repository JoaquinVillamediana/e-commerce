@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">Imagen</a>
            </li>
            <li class="breadcrumb-item active">Nueva imagen</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Agregar nueva imagen(Máx. 10)
              
                <!-- <form method="POST" action="{{ route('categories.store') }}" role="form" enctype="multipart/form-data"> -->
                <div class="form-group mt-3">
                        
                        <!-- {{ csrf_field() }} -->
                        <input name="_method" type="hidden" >
                        <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image">
                        @if ($errors->has('image'))
                                <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                                @endif
                                <span id="image_error" class="invalid-feedback" role="alert" style="display:none;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                             
                                <div id="preview_image" class="mt-2" style=" display:none;"></div> 
                                   
                  
                    </div>
          
                    <!-- <button type="submit" class="btn btn-primary">Agregar Producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form> -->
          
                <!-- <a class="createButton ml-5" href="{{ route('products.create') }}" >@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Crear'))</a>
           -->
          
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Producto</th>                                
                                <th>Imagen</th>  
                               
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aProducts))
                            @foreach($aProducts as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                             
                               
                          
                                  <td><img src="/uploads/products/{{$product->images_name}}" style="width:50px;margin:0 auto;" alt=""></td>
                            
                          
                                    <form id="deleteForm_{{$product->id}}" action="{{action('admin\ProductsController@destroy', $product->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$product->id}});"><i class="fa fa-times"></i></button>
                                    </form>                
                                </td>
                            </tr>   
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
                <small>Copyright ©  2019</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    @include('layouts.modals')

</div>

<!-- 
<script src="/js/admin/image_preview.js"></script>
<script>
    $('#image').change(function() {
        
        setImagePreview(this, $(this).attr('id'));
    });
    
</script> -->

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

@endsection