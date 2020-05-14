@extends('frontend/layouts.app')

@section('content')
<div class="mt-5 pb-5 container-fluid">
@if(!empty($aProducts))
      @foreach ($aProducts as $product)

<div class="card">
  <h5 class="card-header">${{$product->price}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}.</p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>

@endforeach
    @endif


   
@endsection
