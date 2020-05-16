@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-5 pb-5 container-fluid">







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
  

@endsection
