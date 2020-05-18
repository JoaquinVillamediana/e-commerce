@extends('frontend/layouts.app')
<link rel="stylesheet" href="/css/frontend/products.css">
@section('content')
<div class="mt-5 pb-5 container-fluid">
@if(!empty($aProducts))
      @foreach ($aProducts as $product)

<div class="card">
  <h5 class="card-header">${{$product->price}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{!! $product->description !!}</p>
    @if(empty($aCarrito))
  
    <a href="{{route('carritoadd',$product->id)}}" class="btn btn-primary">Añadir al carrito</a>
   
    @else
    @if($aFavoritos != 30)
    <a href="{{route('deleteCarrito',$product->id)}}" class="btn btn-primary">Eliminar del carrito</a>
    @else
    <a href="{{ route('loguser.index') }}" class="btn btn-primary">Añadir al favoritos</a>
    @endif
    @endif



    
    @if(empty($aFavoritos))
 
    <a href="{{route('favoritesadd',$product->id)}}" class="btn btn-primary">Añadir al favoritos</a>

    @else
    @if($aFavoritos != 30)
    <a href="{{route('favoritesDelete',$product->id)}}" class="btn btn-primary">Eliminar del favoritos</a>
    @else
    <a href="{{ route('loguser.index') }}" class="btn btn-primary">Añadir al favoritos</a>
    @endif
    @endif


    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>

@endforeach
    @endif


   
@endsection
