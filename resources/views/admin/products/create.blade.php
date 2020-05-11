@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">Productos</a>
            </li>
            <li class="breadcrumb-item active">Nuevo Producto</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="{{ route('products.store') }}" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                           

                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" maxlength="250" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre:" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un nombre valido.</strong>
                                </span>
                                @endif
                            </div>       

                            <div class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label>Categoria</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach ($aCategories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar una categoria valida.</strong>
                                    </span>
                                    @endif
                                </div>       

                                {{-- ajax --}}

                                <div class="form-group col-12 col-md-6">
                                    <label>Subcategoria</label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id">

                                    </select>
                                    @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar una categoria valida.</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label>Precio</label>
                                    <div class="input-group"> 
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                        
                                      </div>
                                    <input type="number" id="price" name="price" maxlength="250" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="Precio:" value="{{ old('price') }}">
                                </div>
                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar un precio valido.</strong>
                                    </span>
                                    @endif
                                </div>       

                                <div class="form-group col-12 col-md-6">
                                    <label>Stock Actual</label>
                                    <input type="number" id="stock" name="stock" maxlength="250" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" placeholder="Unidades en Stock:" value="{{ old('stock') }}">
                                    @if ($errors->has('stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar un stock valido.</strong>
                                    </span>
                                    @endif
                                </div>       

                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                 <textarea  id="description" name="description" maxlength="250" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descripcion:" value="{{ old('description') }}"></textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar una descripcion valida.</strong>
                                </span>
                                @endif
                            </div>  
                            <div class="form-group">
                                <label>Promociones</label>
                                <input id="news" name="news" maxlength="250" class="form-control{{ $errors->has('news') ? ' is-invalid' : '' }}" placeholder="Promociones: (Opcional)" value="{{ old('news') }}">
                                @if ($errors->has('news'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar una promoción valido.</strong>
                                </span>
                                @endif
                            </div>                              
  

                            <div class="form-group mt-3">
                        
                        <!-- {{ csrf_field() }} -->
                        <input name="_method" type="hidden" >
                        <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image[]" id="image[]">
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
                          
                  

                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <br /><br />
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright Â© BMC 2019</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    @include('layouts.modals')

</div>

<script>
    $(document).ready(function () {
        
        var category_id = $('#category_id').val(); 

        if(category_id > 0){
            setSub_categoryVal(category_id, '#subcategory_id', "{{ url('getSub_CategoriesByCategory')}}", "Sub-Categoria", "{{ old('subcategory_id') }}");       
        }
    });


$('#category_id').change(function(){                      
    setSub_categories($(this).val(), '#subcategory_id', "{{ url('getSub_CategoriesByCategory')}}", "Sub-Categoria");
});


function setSub_categories(value, formSelect, url, defVal) { 

if(value < 1 || value == ""){
$(formSelect).empty();
$(formSelect).append("<option value=''>" + defVal + "</option>");
$(formSelect).prop('disabled', true);
return true;
}

$.get(url,
{ option: value },
function(data) {                     
    $(formSelect).empty();
    $(formSelect).prop('disabled', false);
    $(formSelect).append("<option value=''>" + defVal + "</option>");
    $.each(data, function(key, element) {
        $(formSelect).append("<option value='" + key + "'>" + element + "</option>");
    });
});
}

function setSub_categoryVal(value, formSelect, url, defVal, selectedItem){
    
if(value < 1){
$(formSelect).empty();
$(formSelect).append("<option value=''>" + defVal + "</option>");
$(formSelect).prop('disabled', true);
return true;
}

$.get(url,
{ option: value },
function(data) {                              
    $(formSelect).empty();
    $(formSelect).prop('disabled', false);
    $(formSelect).append("<option value=''>" + defVal + "</option>");
    $.each(data, function(key, element) {
        if(key == selectedItem){
            $(formSelect).append("<option selected value='" + key + "'>" + element + "</option>");
        }else{
            $(formSelect).append("<option value='" + key + "'>" + element + "</option>");
        }                             
    });
});
}



</script>

@endsection