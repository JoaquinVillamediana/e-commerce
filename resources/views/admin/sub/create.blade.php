@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('abooks.index') }}">Libros</a>
            </li>
            <li class="breadcrumb-item active">Nuevo libro</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="{{ route('abooks.store') }}" role="form" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label>Autor</label>
                                <input id="author" name="author" placeholder="Autor:" maxlength="250" class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}">
                                @if ($errors->has('author'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un autor menor a 60 carac.</strong>
                                </span>
                                @endif
                            </div>    

                            <div class="form-group">
                                <label>Genero</label>
                                <input id="genre" name="genre" placeholder="Genero:" maxlength="250" class="form-control {{ $errors->has('genre') ? ' is-invalid' : '' }}">
                                @if ($errors->has('genre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un genero menor a 60 carac.</strong>
                                </span>
                                @endif
                            </div> 

                                 <div class="form-group">
                                <label>Resumen</label>
                                <input id="resume" name="resume" placeholder="Resumen:" maxlength="250" class="form-control {{ $errors->has('resume') ? ' is-invalid' : '' }}">
                                @if ($errors->has('resume'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un resumen menor a 60 carac.</strong>
                                </span>
                                @endif
                            </div>     

                            <div class="form-group">
                                <label>Fecha Publicacion</label>
                                <input id="date" name="date" type='number' maxlength="4" placeholder="AÃ±o de Publicacion (opcional): " class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}">
                                @if ($errors->has('date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un aÃ±o valido.</strong>
                                </span>
                                @endif
                                
                            </div>

                            <div class="form-group">
                            <label>Imagen</label>
                        {{ csrf_field() }}
                     
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

                        

                            <button type="submit" class="btn btn-primary">AÃ±adir Libro</button>
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





@endsection