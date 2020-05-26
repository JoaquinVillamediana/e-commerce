@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-5 pb-5 container-fluid">



  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-md-4 col-12">
        
      <h2 class="text-center" id="text" style="    position: absolute;top: 40px;left: 53px;z-index: 2;display:none">Resultados para <br><br><span >"{{$text}}"</span> </h2>
        
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_DRJ6kG.json"  background="transparent"  speed="0.5"  style="width: 300px; height: 300px;"    autoplay></lottie-player>
    </div>
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
  </div>




@if (!empty($aProducts))
@include('frontend/layouts.products')
              @else

            
              <h2 class="text-right">  {{$scategory_name}}</h2>
              </br>
              </br>
              </br>

              <div class="row">
              <h2 class="text-right">Productos que te pueden interesar</h2>
              </br>
 </br>
 <div class="row">
 </br>
 </br>
              @foreach ($aProductsNews as $productd)
          
 
<div class="col">
            
            <div id="card" class="card" style="width: 18rem;">
              <a  href="{{route('product',$productd->id)}}" id="productBox">
              <img class="card-img-top" src="/uploads/products/{{$productd->image}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$productd->name}}</h5>
                <p class="card-text text-dark">${{$productd->price}}</p>
                
              </div>
            </a>
            </div>
            </br>
 </br>
 </br>
          </div>
        
        
              @endforeach
              @endif
  
<script>
  $( document ).ready(function() {
  $('#text').fadeIn(400);
  
});
</script>
@endsection
