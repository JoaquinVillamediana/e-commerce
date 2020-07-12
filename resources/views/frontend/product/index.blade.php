@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/product.css">
<div class="mt-5 pb-5 container-fluid">
@if(!empty($oProduct))
      
@foreach($oProduct as $product)
{{-- <div class="card">
  <h5 class="card-header">@if ($product->prom != null)
    <span class="card-text text-danger"><del>${{$product->price}}</del> </span>
    <span class="text-success">${{$product->price * ($product->prom / 100)}}</span>
       
    @else
    <span class="card-text text-dark">${{$product->price}}</span>
    @endif</h5>
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>

    

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


 --}}


 <div class="container">
  <div class="row">
    <div class="col-2">
      <div class="row">
        @foreach ($aImage as $image)
        @if ($image->type==0)
          <div class="col-12 mt-2">
            <img class="d-block w-100 small-image" onclick="changeMainImage('{{$image->image}}','image')" style="width: 100%;max-height:530px;object-fit:cover" src="/uploads/products/{{$image->image}}" alt="First slide">
          </div>
        @else
          <div class="col-12 mt-2">
          <video class="d-block w-100 small-image" onclick="changeMainImage('{{$image->image}}','video')" style="width:100%;" src="/uploads/products/{{$image->image}}" loop muted >
          Your browser does not support HTML5 video.
          </video>
        </div>
        @endif
      @endforeach 
      </div>
      
    </div>

    <div class="col-md-6 col-10">
      @foreach ($aImage as $image)
        @if ($image == $aImage[0])
          <div class="col-12 mt-2">
            <img class="d-block w-100 main-image"  style="width: 100%;max-height:600px;object-fit:cover" src="/uploads/products/{{$image->image}}" >
            <video  class="d-block w-100 main-video" style="width: 100%;max-height:600px;object-fit:cover;"  loop muted autoplay src="">Your browser does not support HTML5 video.</video>
          </div>
        @endif
      @endforeach 
      
    </div>

    <div class="col-md-4 col-12">
      <div class="row">
        <div class="col-12">
          @if ($product->prom != null)
              <div class="discount d-inline">
                {{$product->prom}}%
              </div>
          @endif
          @if ($product->news == 1)
              <div class="ml-2 d-inline">
                <span class="font-weight-bold">Nuevo</span>
              </div>
          @endif
        </div>
        <div class="col-12 mt-3">
          <h5 class="">{{$product->name}}</h5>
        </div>
        <div class="col-12">
        {!! $product->description !!}
        </div>
        <div class="col-12 mt-2">
          @if ($product->prom != null)
              <p >
                <span class=" text-danger">${{$product->price * ($product->prom / 100)}}</span>  
                <span class="card-text"><del>${{$product->price}}</del> </span>
              </p>   
              @else
              <p class="card-text" style="color:#000;">${{$product->price}}</p>
              @endif
        </div>

      </div>
    </div>

  </div>


 </div>






@endforeach
    @endif



<script>

function changeMainImage(id,type){
  if(type == 'image')
  {
    url = "/uploads/products/"+id;
    $('.main-image').attr('src',url);
    $('.main-video').attr('src','');
  }
  else
  {
    url = "/uploads/products/"+id;
    $('.main-video').attr('src',url);
    $('.main-image').attr('src','');
  }
  
}

  
</script>

   
@endsection

