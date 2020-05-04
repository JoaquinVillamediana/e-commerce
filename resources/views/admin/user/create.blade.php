@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Alta de Usuario</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="{{ route('user.store') }}" role="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Tipo</label>
                                <select id="type" name="type"
                                    class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <option value="2" {{ (old("type") == 2 ? "selected":"") }}>Usuario</option>
                                    <option value="1" {{ (old("type") == 1 ? "selected":"") }}>Administrador</option>
                                </select>
                                @if ($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe seleccionar un tipo de usuario.</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">

                                <div class="form-group col-md">
                                    <label>Nombre</label>
                                    <input id="name" name="name" maxlength="60"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="Nombre" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar un nombre.</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md">
                                    <label>Apellido</label>
                                    <input id="last_name" name="last_name" maxlength="60"
                                        class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                        placeholder="Apellido" value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar un apellido.</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" name="email" maxlength="60"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un email.</strong>
                                </span>
                                @endif
                                @if ($errors->has('duplicated_email_error'))
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>El email ingresado ya se encuentra registrado.</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">

                                <div class="form-group col-md">
                                    <label>Provincia</label>
                                    <select id="province_id" name="province_id"
                                        class="form-control{{ $errors->has('province_id') ? ' is-invalid' : '' }}"
                                        palceholder="Provincia" value="{{ old('province_id') }}">
                                        <option value="">Provincia</option>
                                        @if(!empty($aProvinces))
                                        @foreach($aProvinces as $province)
                                        <option value="{{$province->id}}"
                                            {{ (old('province_id') == $province->id ? "selected":"") }}>
                                            {{$province->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('province_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar una provincia.</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md">
                                    <label>Ciudad</label>
                                    <select id="city_id" name="city_id" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}">
                                        <option value="">Ciudad</option>                    
                                    </select>
                                    @if ($errors->has('city_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar una ciudad.</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="row">



                                <div class="form-group col-md">
                                    <label>Direccion</label>
                                    <input id="dir" name="dir" type="text" maxlength="60"
                                        class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}"
                                        placeholder="Direccion" value="{{ old('dir') }}">
                                    @if ($errors->has('dir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar una dirección.</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md">
                                    <label>Telefono</label>
                                    <input id="phone" name="phone" type="number" maxlength="60"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        placeholder="Telefono" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar un teléfono.</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md">
                                    <label>Razon Social</label>
                                    <input id="business_name" name="business_name" type="text" maxlength="60"
                                        class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}"
                                        placeholder="Razon Social" value="{{ old('business_name') }}">
                                    @if ($errors->has('business_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe ingresar una razón social.</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md">
                                    <label>Objetivo/s</label>
                                    <select id="objective_id" name="objective_id"
                                        class="form-control{{ $errors->has('objective_id') ? ' is-invalid' : '' }}"
                                        palceholder="Objetivo/s" value="{{ old('objective_id') }}">
                                        @foreach ($aObj as $oObj)
                                        <option value="{{$oObj->id}}">{{$oObj->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('objective_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar un objetivo.</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>


                            <div class="form-group" id="box_password">
                                <label>Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="Password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un password (min. 8 caracteres).</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
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

<script src="/vendor/editable-select/jquery-editable-select.js"></script>
<link href="/vendor/editable-select/jquery-editable-select.css" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {
        
        var provinceId = $('#province_id').val(); 

        if(provinceId > 0){
            setCityVal(provinceId, '#city_id', "{{ url('getCitiesByProvince')}}", "Ciudad", "{{ old('city_id') }}");       
        }
    });


    
    




    $('#province_id').change(function(){                      
        setCity($(this).val(), '#city_id', "{{ url('getCitiesByProvince')}}", "Ciudad");
    });

    
    function setCity(value, formSelect, url, defVal) { 

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

function setCityVal(value, formSelect, url, defVal, selectedItem){
        
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


   
    
    $( "#name" ).keyup(function() {             
       setInitials();  
    });
    
    $( "#last_name" ).keyup(function() {             
       setInitials();  
    });
    
    function setInitials() {
        $( "#initials" ).val($('#name').val().charAt(0).toUpperCase() + $('#last_name').val().charAt(0).toUpperCase());
    }

</script>


@endsection