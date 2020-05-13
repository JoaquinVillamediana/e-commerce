@extends('frontend/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

       
        
        </br>
        </br>
        
        </br>
        <h1>PROMOCIONES</h1>
        </div>
        </br>
        </br>
        
        </br>
        @if(!empty($aImage))
                            @foreach($aImage as $xd)
        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/uploads/products/{{ $xd->image_dir}}" style="width:250px;margin:0 auto;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $xd->name}}</h5>
    <p class="card-text"> Precio: ${{ $xd->price}}
    </br>
    
    {{ $xd->description}}
    </p>
    <a href="#" class="btn btn-primary">Más información</a>
    
  </div>
</div>


@endforeach
</br>
        
        </br>
@else
<h1> sin PROMOCIONES</h1>
@endif
</br>
        
        </br>
    </div>

    
</div>
@endsection
