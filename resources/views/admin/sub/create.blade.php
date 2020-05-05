@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sub.index') }}">Sub-Categoria</a>
            </li>
            <li class="breadcrumb-item active">Nuevo Categoria</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="{{ route('sub.store') }}" role="form" enctype="multipart/form-data">
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
                                <label>Descripcion</label>
                                <input id="description" name="description" maxlength="250" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descripcion:" value="{{ old('description') }}">
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar una descripcion valido.</strong>
                                </span>
                                @endif
                            </div>         
                            <div class="form-group">
                                <label>Categoria</label>
                                <input id="category_id" name="category_id" maxlength="250" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" placeholder="Categoria:" value="{{ old('category_id') }}">
                                @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar una categroias valido.</strong>
                                </span>
                                @endif
                            </div>                          

                          
                  

                            <button type="submit" class="btn btn-primary">Agregar subcategoria</button>
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