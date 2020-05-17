@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-2 container-fluid">





    <div class="row pt-5 justify-content-center text-right">

      <div class="col ">
          <h2 class="text-center">{{"MI favoritos"}}</h2>
      </div>
        {{-- <div class="col pl-0 mb-2">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_HirsSZ.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"    autoplay></lottie-player> --}}
</div>

@if (!empty($aProducts))
@foreach ($aProducts as $product)
          



<div class="card">

  <h5 class="card-header">${{$product->price}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{!! $product->description !!}</p>
    <a href="{{route('product',$product->id)}}" class="btn btn-primary">Comprar</a>
  </div>
  
</div>

            
         
            </br>
 </br>
 </br>
        
        
              @endforeach
  
              @endif
  

    </div>
</div>
@endsection
