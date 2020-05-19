@extends('frontend/layouts.app')

@section('content')

<div class="mt-2 container-fluid">


  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-4">
        <h2 class="text-center" id="headFav" style="    position: absolute;top: 115px;left: 120px;z-index: 2;display:none">Carrito</h2>
        
        
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_Iy9jag.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
  </div>
        
</div>
<?php $total=0?>
<div class="row">
@if (!empty($aProducts))
@foreach ($aProducts as $product)
          
<div class="col">


<div class="card mt-3 mb-3">

  <h5 class="card-header">${{$product->price}}</h5>
  <div class="card-body">
    <h5 class="card-title"> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h5>
    <p class="card-text">{!! $product->description !!}</p>
    
  </div>
  
</div>
</div>
        <?php $total+=$product->price?>
              @endforeach
  <div class="col-md-8 col-12 offset-md-2 mt-3 border-top border-dark pt-2">
    <h5 class="text-center">Total: ${{$total}}</h5>
  </div>
  <div class="col-md-8 col-12 offset-md-2 mt-4">
    <a href="{{route('product',$product->id)}}" class="btn btn-primary btn-block">Comprar</a>
  </div>
              @endif
  

    </div>
  </div>
</div>
<script>$( document ).ready(function() {
  $('#headFav').fadeIn(400);
});</script>
@endsection
