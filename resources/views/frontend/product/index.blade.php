@extends('frontend/layouts.app')

@section('content')
<div class="mt-5 pb-5 container-fluid">
@if(!empty($oProduct))
      
@foreach($oProduct as $product)
<div class="card">
  <h5 class="card-header">@if ($product->prom != null)
    <span class="card-text text-danger"><del>${{$product->price}}</del> </span>
    <span class="text-success">${{$product->price * ($product->prom / 100)}}</span>
       
    @else
    <span class="card-text text-dark">${{$product->price}}</span>
    @endif</h5>
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>

    {{-- Carrousel IN --}}

    <div id="carouselExampleControls" data-interval="false" class="carousel slide" data-ride="carousel">
  
      <div class="carousel-inner">
        @foreach ($aImage as $image)
            
        
        <div class="carousel-item @if($image == $aImage[0]) active @endif">
          @if ($image->type==0)
          <img class="d-block w-100" style="width: 100%;max-height:530px;object-fit:cover" src="/uploads/products/{{$image->image}}" alt="First slide">
          @else
          <video class="d-block w-100" style="width:100%;" src="/uploads/products/{{$image->image}}" loop autoplay muted >
            Your browser does not support HTML5 video.
          </video>
          @endif
        </div>

        @endforeach
        
      </div>

      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    {{-- cARROUSEL Out --}}
    <p class="card-text">{!! $product->description !!}</p>
    @if(empty($aCart))
    <a href="{{route('cartAction',$product->id)}}" class="btn mt-2 btn-primary">Añadir al carrito</a>
    @else
    <a href="{{route('cartAction',$product->id)}}" class="btn mt-2 btn-primary">Eliminar del carrito</a>
    @endif
    @if(empty($aFavorites))
    <a href="{{route('favoritesAction',$product->id)}}" class="btn mt-2 btn-primary">Añadir al favoritos</a>
    @else
    <a href="{{route('favoritesAction',$product->id)}}" class="btn mt-2 btn-primary">Eliminar del favoritos</a>
    @endif


    <a href="#" class="btn mt-2 btn-primary">Comprar</a>
  </div>
</div>

@endforeach
    @endif


   
@endsection
