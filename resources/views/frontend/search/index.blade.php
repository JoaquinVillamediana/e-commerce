@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-5 pb-5 container-fluid">


    <div class="row  mb-5 justify-content-center text-right">

      <div class="col text-center" >
        <p style="color: #000 !important">Resultados para</p>
        <h2 style="font-size: 25px;color:#000;" class="font-weight-bold text-center">"{{$text}}"</h2>
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
