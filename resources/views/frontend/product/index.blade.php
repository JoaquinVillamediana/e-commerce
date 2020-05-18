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
    <a href="{{route('favoritesAction',$product->id)}}" class="btn btn-primary">Añadir al carrito</a>
    @else
    <a href="{{route('favoritesAction',$product->id)}}" class="btn btn-primary">Eliminar del carrito</a>
    @endif
    @if(empty($aFavorites))
    <a href="{{route('favoritesAction',$product->id)}}" class="btn btn-primary">Añadir al favoritos</a>
    @else
    <a href="{{route('favoritesAction',$product->id)}}" class="btn btn-primary">Eliminar del favoritos</a>
    @endif


    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>

@endforeach
    @endif


   
@endsection
