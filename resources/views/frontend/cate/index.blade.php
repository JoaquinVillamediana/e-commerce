@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-2 container-fluid">





    <div class="row pt-5 justify-content-center text-right">

      <div class="col ">
          <h2 class="text-center">{{$category_name->name}}</h2>
      </div>
        {{-- <div class="col pl-0 mb-2">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_HirsSZ.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"    autoplay></lottie-player> --}}
</div>
{{-- @if (!empty($aProducts))
@foreach ($aProducts as $product)
          


      
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">
               Precio: ${{$product->price}}
                </br>
                {!!$product->description!!}</p>
             
                <a href="{{route('product',$product->id)}}" class="btn btn-primary">Ver producto</a>
              </div>
            </div>
            </br>
         </br>
          </div>
        
        
              @endforeach
              @endif --}}
    </div>


    <div class="row">
      @foreach ($aProducts as $product)
          <div class="col">
            
            <div id="card" class="card" style="width: 18rem;">
              <a  href="{{route('product',$product->id)}}" id="productBox">
              <img class="card-img-top" src="/uploads/products/{{$product->image}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text text-dark">${{$product->price}}</p>
                
              </div>
            </a>
            </div>
          
          </div>
      @endforeach
    </div>
</div>
@endsection
