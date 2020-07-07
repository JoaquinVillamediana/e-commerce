@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="css/frontend/register.css">
<div class="container mt-5">
    <h2 class="text-center  mb-3" style="font-size:25px;color: #000">Registro</h2>
    

<form method="POST" style="display: none;" id="form_register" action="{{ route('register.store') }}" role="form"
enctype="multipart/form-data">
{{ csrf_field() }}



<div class="row">

    <div class="form-group col-12">
        
        <input id="name" name="name" maxlength="60"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="Nombre" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>Debe ingresar un nombre.</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-12  ">
        
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
<div class="row">
<div class="form-group col-12">
    
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


<div class="form-group col-12">
    
    <input id="phone" name="phone" maxlength="60"
        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
        placeholder="Teléfono" value="{{ old('phone') }}">
    @if ($errors->has('phone'))
    <span class="invalid-feedback" role="alert">
        <strong>Debe ingresar un teléfono.</strong>
    </span>
    @endif
</div>
</div>
<div class="row">
<div class="form-group col-12" id="box_password">
    
    <input type="password" id="password" name="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        placeholder="Contraseña" value="{{ old('password') }}">
    @if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>Debe ingresar un password (min. 8 caracteres).</strong>
    </span>
    @endif
</div>
</div>
<div class="row">
    <div class="form-group col-12" id="box_password">
       
        <input type="password" id="verif_password" name="verif_password"
            class="form-control{{ $errors->has('verif_password') ? ' is-invalid' : '' }}"
            placeholder="Confirmar Contraseña" value="{{ old('verif_password') }}">
        @if ($errors->has('verif_password'))
        <span class="invalid-feedback" role="alert">
            <strong>Las contraseñas deben ser iguales.</strong>
        </span>
        @endif
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            
            <button type="submit" id="submitBtn" class="btn-block btn  "  >
                Registrarme
            </button>
            
        </div>
    </div>
    </form>

</div>

<script>
$( document ).ready(function() {
    $('#form_register').fadeIn(1000);
});
</script>

@endsection
