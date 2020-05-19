@extends('frontend/layouts.app')






@section('content')
<div class="mt-5 pb-5 container-fluid">
  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-4">
        <h2 class="text-center" id="userName" style="    position: absolute;top: 215px;left: 20px;z-index: 2;display:none">{{Auth::user()->last_name}}, {{Auth::user()->name}}</h2>
        
        
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/packages/lf20_5AavoT.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"    autoplay></lottie-player>
    </div>
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
  </div>



<div class="card">

  <h5 class="card-header">  Ficha de Datos</h5>
  <div class="card-body">
    <h5><span class="font-weight-bold"> Nombre: </span> {{Auth::user()->name}} <a href="" data-toggle="modal" data-target="#profileModal"><i class="ml-3 text-secondary far fa-edit"></i></a> </h5>
    <h5><span class="font-weight-bold"> Apellido:</span> {{Auth::user()->last_name}} <a href="" data-toggle="modal" data-target="#profileModal"><i class="text-secondary ml-3 far fa-edit"></i></a></h5>
    <h5><span class="font-weight-bold"> E-mail: </span> {{Auth::user()->email}}</h5>
    <h5><span class="font-weight-bold"> Telefono: </span> {{Auth::user()->phone}} <a href="" data-toggle="modal" data-target="#profileModal"><i class="text-secondary ml-3 far fa-edit"></i> </a></h5>
    <a href="#" class="btn btn-primary">Editar datos</a>
  </div>
  
</div>

</div>

<script>$( document ).ready(function() {
  $('#userName').fadeIn(400);
});</script>
@endsection
