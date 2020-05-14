@extends('frontend/layouts.app')

@section('content')
<div class="mt-2 container-fluid">





    <div class="row pt-5 justify-content-center text-right">

<div class="col col-md-7 mb-2 pt-3 pr-1">
  <h2 class="text-right">PROMOCIONES</h2>
</div>
<div class="col pl-0 mb-2">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_HirsSZ.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"    autoplay></lottie-player>
</div>

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="mt-4 carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">PROMOCION 1</h3>
        <p>Comentario</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">PROMOCION 2</h3>
        <p>Comentario</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">PROMOCION 3</h3>
        <p>Comentario</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->

  
  
</div>
<!--/.Carousel Wrapper-->
</div>
  <div class="row mt-4">

      @if (!empty($aProducts))
     
      <div class="col col-md-7 mb-2 pt-3 pr-1" >
     
        <h2 class="text-right">NOVEDADES</h2>
        </div>
    
        
        <div class="col pl-0 pt-1 mb-2">
          
          <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
          <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qznxcZ.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"    autoplay></lottie-player>
        </div>
        
    
  </div>
    </br>
    </br> 
    <div class="row">
    </br>
    </br>
 </br>
 </br>
      @foreach ($aProducts as $product)
          


      
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">
       Precio: ${{$product->price}}
        </br>
        {{$product->description}}</p>
     
        <form method="POST" action="" id="task_form" role="form">
        <button type="submit" class="btn btn-primary">Más información</button>
       
        </form>
      </div>
    </div>
    </br>
 </br>
  </div>


      @endforeach

    </div>

    @endif
</div>
@endsection
