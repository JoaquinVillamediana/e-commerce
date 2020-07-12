@extends('frontend/layouts.app')

@section('content')


</br>

    
    <div class="col-md-4 col-12">
        <h2 class="text-center" id="headFav" style="position: absolute;z-index: 2;display:none">Carrito de compras</h2>
        
        
      
    </div>
   
  
        
</br>
</br>


<?php $total=0?>

@if (!empty($aProducts))
@foreach ($aProducts as $product)
<div class="row">   
  <div class="col-md-6 col-10">
  <div class="row"> 
  <img src="/uploads/products/{{$product->image}}" alt="ProductImage" width="40px" height="40px">
  
    <h5> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h5>
    </div>
  </div>  
  <div class="col-md-4 col-10">     
    <p>
      1
    </p>
  </div>  
   <div class="col-md-2 col-10">  
            
             
    <h5>@if ($product->prom != null)
    <span class="card-text text-danger"><del>${{$product->price}}</del> </span>
    <span class="text-success">${{$product->price * ($product->prom / 100)}}</span>
       
    @else
  
    <span class="text-dark">${{$product->price}}</span>
  
    @endif
    </h5>
            
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

    <div class="row"> 
       
    

        <div class="col-md-4 col-10">
          <h5 class="text-center">Costo total: ${{$total}}</h5>
        </div>
        <div class="col-md-8 col-10 ">
        <button type="submit" id="submitBtn" class="btn-block btn btn-dark " style="background-color: #37474F; border:#37474F;" >
                {{ __('Login') }}
            </button>
            <style>
                #submitBtn:hover{
                    background-color: #435a66 !important;
                }
            </style>
        </div>
    
      </div> 
    
    
              @endif
  

   
  </div>
</div>
<script>$( document ).ready(function() {
  $('#headFav').fadeIn(400);
});</script>
@endsection
