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
               
              <div class="table-responsive">

          
                <a class="m-auto createButton" data-toggle="modal" data-target="#imageModal" >@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Cargar Imagen o Video'))</a>
                
           </div>   
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
                            @if(!empty($aImages))
                            @foreach($aImages as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{$image->product_name}}</td>
                             
                               
                          
                                  <td><img src="/uploads/products/{{$image->image}}" style="width:100px;margin:0 auto;" alt=""></td>
                            
                                  <td>
                          
                                    <form id="deleteForm_{{$image->id}}" action="{{route('deleteImage',$image->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$image->id}});"><i class="fa fa-times"></i></button>
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
        <div class="row mt-5">
            <div class="col  offset-md-10">
        <a href="{{route('products.index')}}" class=" btn btn-primary">Finalizar<i class="fas ml-1 fa-angle-right"></i></a>
    </div>
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

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>
<script src="/js/admin/image_preview.js"></script>
<script>

    $('#image').change(function() {
        setImagePreview(this, $(this).attr('id'));
    });
    
</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

@endsection