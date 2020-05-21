@extends('frontend/layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-light mb-3" style="color:#37474F !important;">Registro de Usuario</h2>
    <div class="lottie  m-auto">
        @if ($errors->has('email') || $errors->has('password'))
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player class="m-auto" src="https://assets1.lottiefiles.com/temp/lf20_yYJhpG.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @else
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player class="m-auto" src="/vendor/lotties/new_user.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @endif
</div>

<form method="POST" style="display: none;" id="form_register" action="{{ route('register.store') }}" role="form"
enctype="multipart/form-data">
{{ csrf_field() }}



<div class="row">

    <div class="form-group col col-md-3 offset-md-3">
        <label style="color: #37474f">Nombre</label>
        <input id="name" name="name" maxlength="60"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="Nombre" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>Debe ingresar un nombre.</strong>
        </span>
        @endif
    </div>

    <div class="form-group col col-md-3 ">
        <label style="color: #37474f">Apellido</label>
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
<div class="form-group col col-md-3 offset-md-3">
    <label style="color: #37474f">Email</label>
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


<div class="form-group col col-md-3 ">
    <label style="color: #37474f">Teléfono</label>
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
<div class="form-group col-md-6 offset-md-3" id="box_password">
    <label style="color: #37474f">Contraseña</label>
    <input type="password" id="password" name="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        placeholder="Password" value="{{ old('password') }}">
    @if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>Debe ingresar un password (min. 8 caracteres).</strong>
    </span>
    @endif
</div>
</div>
<div class="row">
    <div class="form-group col-md-6 offset-md-3" id="box_password">
        <label style="color: #37474f">Confirmar Contraseña</label>
        <input type="password" id="verif_password" name="verif_password"
            class="form-control{{ $errors->has('verif_password') ? ' is-invalid' : '' }}"
            placeholder="Repite tu Password" value="{{ old('verif_password') }}">
        @if ($errors->has('verif_password'))
        <span class="invalid-feedback" role="alert">
            <strong>Las contraseñas deben ser iguales.</strong>
        </span>
        @endif
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-2 offset-md-5">
            
            <button type="submit" id="submitBtn" class="btn-block btn btn-dark " style="background-color: #37474F; border:#37474F;" >
                Registrarme
            </button>
            <style>
                #submitBtn:hover{
                    background-color: #435a66 !important;
                }
            </style>
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
