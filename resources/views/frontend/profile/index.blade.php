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
    <div class="row">
      <form method="POST" style="width: 100%" action="{{ route('profile_update') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="col-12 mt-3">
        <h5 class="d-inline-block"><span class="font-weight-bold"> Nombre: </span> {{Auth::user()->name}} <a href="" onclick="showInputs('name')"><i class="ml-3     text-secondary far fa-edit"></i></a> </h5> <input style="width:30%;display:none !important;" class="d-inline-block ml-4 form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" id="name" type="text">
        </div>
        <div class="col-12 mt-3">
        <h5 class="d-inline-block"><span class="font-weight-bold"> Apellido:</span> {{Auth::user()->last_name}} <a href="" onclick="showInputs('last_name')"><i     class="text-secondary ml-3 far fa-edit"></i></a></h5><input style="width:30%;display:none !important;" class="d-inline-block ml-4 form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"  name="last_name" id="last_name"     type="text">
        </div>
        <div class="col-12 mt-3">
        <h5 class=""><span class="font-weight-bold"> E-mail: </span> {{Auth::user()->email}}</h5>
      </div>
      <div class="col-12 mt-3">
        <h5 class="d-inline-block"><span class="font-weight-bold"> Telefono: </span> {{Auth::user()->phone}} <a href="" onclick="showInputs('phone')"><i class="text-secondary    ml-3 far fa-edit"></i> </a></h5><input  style="width:30%;display:none !important;" class="d-inline-block ml-4 form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"  name="phone" id="phone" type="number">
      </div>
        <button type="submit"  class="ml-2 mt-3 btn btn-primary">Confirmar cambios</button>
        
      </form>
    </div>
  </div>
  
</div>

</div>

<script>$( document ).ready(function() {
  $('#userName').fadeIn(400);
});

function showInputs(id){
  event.preventDefault();
  $('#'+id).fadeIn(300);
}
</script>
@endsection

