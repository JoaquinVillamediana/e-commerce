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
              </br>
              </br>
              <div class="table-responsive">

                <!-- <form method="POST" action="{{ route('categories.store') }}" role="form" enctype="multipart/form-data"> -->
                <div class="form-group">
                
                        <div class="file-loading">
                        <div class="table-responsive">
                            <input id="image-file" type="file" name="file" accept="image/*" style="max-width:100%;height:auto;" data-min-file-count="1" multiple>
                     
                            </div>

                        </div>

                      

                    </div>      
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product_id }}">
                    <!-- <button type="submit" class="btn btn-primary">Agregar Producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form> -->
          
                <!-- <a class="createButton ml-5" href="{{ route('products.create') }}" >@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Crear'))</a>
           -->
           </div>   
            </div>         
            <!-- <div class="card-body">
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
                        
                        <!-- <tbody>
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
            </div> -->
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


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#image-file").fileinput({
            theme: 'fa',
            uploadUrl: "{{route('image.upload')}}",
            uploadExtraData: function() {
                return {
                    _token: "{{ csrf_token() }}",
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg', 'mp4'],
            overwriteInitial: false,
            maxFileSize:1000,
            maxFilesNum: 10
        });
    </script>


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