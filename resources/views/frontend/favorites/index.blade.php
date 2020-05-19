@extends('frontend/layouts.app')

@section('content')

<div class=" container-fluid">





  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-4">
        <h2 class="text-center" id="headFav" style="    position: absolute;top: 100px;left: 100px;z-index: 2;display:none">Favoritos</h2>
        
        
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets2.lottiefiles.com/temp/lf20_5taKk6.json"  background="transparent"  speed="0.5"  style="width: 300px; height: 300px;"    autoplay></lottie-player>
    </div>
    <div class="col-4">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
  </div>

  <div class="row">
  @if (!empty($aProducts))
  @foreach ($aProducts as $product)
          



    <div class="card m-3">

      <h5 class="card-header">${{$product->price}}</h5>
       <div class="card-body">
        <h5 class="card-title"> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h5>
        <p class="card-text">{!! $product->description !!}</p>
        <a href="{{route('product',$product->id)}}" class="btn btn-primary">Comprar</a>
       </div>
    </div>        
  @endforeach
  
  @endif
  </div>

</div>
<script>$( document ).ready(function() {
  $('#headFav').fadeIn(400);
});</script>
@endsection
