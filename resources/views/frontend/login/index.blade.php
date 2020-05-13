@extends('frontend/layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center justify-content-center mt-5 mb-3" style="color: #4790de">Ingresar a E-Commerce</h2>
    <div class=" row ">
    <div class="lottie  col m-auto">
        @if ($errors->has('email') || $errors->has('password'))
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player class="m-auto" src="https://assets1.lottiefiles.com/temp/lf20_yYJhpG.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @else
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player class="m-auto" src="https://assets9.lottiefiles.com/packages/lf20_an6wWA.json"  background="transparent"  speed="2"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
        @endif
</div>
</div>
    <form method="POST" action="{{ route('login') }}" style="display:none" id="form-login" class="row mt-4">
        {{csrf_field()}}
        
        <div class="col-md-7  col-12 m-auto">
            <div class="form-group">
                <label class="text-light " for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="example@example.com" aria-describedby="emailHelp">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>Credenciales no v&aacute;lidas.</strong>
                    </span>
                    @endif  
              </div>
        </div>
  
        
        <div class="col-md-7  col-12 m-auto">
            <div class="form-group">
                <label class="text-light" for="exampleInputPass1">Contraseña</label>
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
            
            <button type="submit" class="btn-block btn btn-dark " style="background-color: #4790de; border:#4790de;" >
                {{ __('Login') }}
            </button>
        </div>
    
    </form>

</div>

<script>
$( document ).ready(function() {
    $('#form-login').fadeIn(1000);
});
</script>

@endsection
