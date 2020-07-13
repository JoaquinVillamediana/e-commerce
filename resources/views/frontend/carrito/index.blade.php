@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/cart.css">
<div class="mt-5 container-fluid">

  

    <div class="d-inline">
      <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      </div>
    <div class="div-title">
    <h2 style="color:#000;" class=" d-inline title font-weight-bold text-left">Carrito de compras</h2>
  </div>
      
  
        
</div>
</div>
<?php $total=0?>
<div class="row">
@if (!empty($aProducts))
<div class="col-12 mb-4 mt-5">
  <div class="row">
    <div class="col-5">
      <h3 class="grid-header">Producto</h3>
    </div>
    <div class="col-3">
      <h3 class="grid-header">Cantidad</h3>
    </div>
    <div class="col-4">
      <h3 class="grid-header">Precio</h3>
    </div>
  </div>
</div>
@foreach ($aProducts as $product)
          
<div class="col-12 mb-4">

  <div class="row">
    <div class="col-5">
      @foreach ($aImage as $image)
      @if ($image->product_id == $product->id && $image->type == 0 && $image->main_image == 1) 
        <img class="product_image" src="/uploads/products/{{$image->image}}" alt="">
      @endif    
      @endforeach
      <div class="text">
        
            <h4>{{$product->name}} <br>


            <span>Codigo de producto: #{{$product->id}}</span></h4>

        </div>
        
        
      </div>
    
    <div class="col-3">

    </div>
    <div class="col-4">
      @if ($product->prom != null)
        <h2 class="price">${{$product->price * ($product->prom / 100)}}</h2>
      @else
        <h2 class="price">${{$product->price}}</h2>
      @endif
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
            </div>
 <div class="row">
   <div class="col-7">
     <div class="continue">
      <a class="continue" href="{{route('home')}}"><i class="fas fa-arrow-left mr-1"></i>Continuar comprando</a>
     </div>
   
   </div>
   <div class="col-3">
    <p class="total-price">Costo total: <span>${{$total}}</span></p>
   </div>
   <div class="col-2">
    <a href="" class="shop-btn btn">PAGAR</a>
   </div>
 </div>
              @endif
  

    
  </div>
</div>
<script>$( document ).ready(function() {
  $('#headFav').fadeIn(400);
});</script>
@endsection
