@extends('frontend/layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-light mb-3">Registro de Usuario</h2>
    <div class="lottie  m-auto">
        @if ($errors->has('email') || $errors->has('password'))
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player class="m-auto" src="https://assets1.lottiefiles.com/temp/lf20_yYJhpG.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @else
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player class="m-auto" src="https://assets2.lottiefiles.com/packages/lf20_sOjs8q/add_contact_05.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @endif
</div>

<form method="POST" style="display: none;" id="form_register" action="{{ route('user.store') }}" role="form"
enctype="multipart/form-data">
{{ csrf_field() }}



<div class="row">

    <div class="form-group col col-md-3 offset-md-3">
        <label class="text-light">Nombre</label>
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
        <label class="text-light">Apellido</label>
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
    <label class="text-light">Email</label>
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
    <label class="text-light">Teléfono</label>
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
    <label class="text-light">Contraseña</label>
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
        <label class="text-light">Confirmar Contraseña</label>
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
        <div class="col-2 offset-md-5">
            
            <button type="submit" class="btn-block btn btn-dark " style="background-color: #303F9F; border:#303F9F;" >
                Registrarme
            </button>
        </div>

    </form>

</div>

<script>
$( document ).ready(function() {
    $('#form_register').fadeIn(1000);
});
</script>

@endsection
