@extends('frontend/layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center justify-content-center mt-5 mb-3" style="color: #37474F">Recuperacion de contraseña</h2>

    <form method="POST" action="{{ route('login') }}" style="display:none" id="form-login" class="row mt-4">
        {{csrf_field()}}
        
        <div class="col-md-7  col-12 m-auto">
            <div class="form-group">
                <label style="color: #37474f" for="exampleInputEmail1">Nueva contraseña</label>
                <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  aria-describedby="emailHelp">
                <small id="emailHelp" class=" text-light form-text text-muted">Nunca compartiremos tus datos personales.</small>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
              </div>
        </div>
  
        
        <div class="col-md-7  col-12 m-auto">
            <div class="form-group">
                <label style="color: #37474f"  for="exampleInputPass1">Confirmar nueva contraseña</label>
                <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  aria-describedby="emailHelp">
                <small id="emailHelp" class=" text-light form-text text-muted">Nunca compartiremos tus datos personales.</small>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
            </div>

        </div>
   
        <div class=" col-12 col-md-2 offset-md-5">
            
            <button type="submit" id="submitBtn" class="btn-block btn btn-dark " style="background-color: #37474F; border:#37474F;" >
                {{ __('Cambiar constraseña') }}
            </button>
            <style>
                #submitBtn:hover{
                    background-color: #435a66 !important;
                }
            </style>
        </div>
        
       
    </form>

</div>

<script>
$( document ).ready(function() {
    $('#form-login').fadeIn(1000);
});
</script>

@endsection
