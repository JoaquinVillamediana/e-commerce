@extends('frontend/layouts.app')

@section('content')

<div class="mt-2 container-fluid">


  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-md-4 col-12">
        <h2 class="text-center" id="headFav" style="    position: absolute;top: 115px;left: 120px;z-index: 2;display:none">Carrito</h2>
        
        
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_Iy9jag.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
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

  <h5 class="card-header">@if ($product->prom != null)
    <span class="card-text text-danger"><del>${{$product->price}}</del> </span>
    <span class="text-success">${{$product->price * ($product->prom / 100)}}</span>
       
    @else
    <span class="card-text text-dark">${{$product->price}}</span>
    @endif</h5>
  <div class="card-body">
    <h5 class="card-title"> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h5>
    <p class="card-text">{!! $product->description !!}</p>
    
  </div>
  
</div>
</div>
        <?php
        if($product->prom != null)
        {
          $total += $product->price * ($product->prom / 100);
        }
        else {
          $total+=$product->price;
        }
        ?>
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
