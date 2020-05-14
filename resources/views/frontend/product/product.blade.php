@extends('frontend/layouts.app')

@section('content')
<div class="mt-5 pb-5 container-fluid">





    <div class="row pt-5 justify-content-center text-right">
      @if(!empty($aProducts))
      @foreach ($aProducts as $product)
  
      <div class="col-3 offset-md-2" style="color: #4790de">
        <h1>{{$product->name}}</h1>
        </div>
        
        <div class="media">
  <img src="..." class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">{{$product->price}}</h5>

    {{$product->description}}
  </div>
</div>
    </div>
    <div class="row">
    </br>
    </br>
 </br>
 </br>
   
    </div>

    @endforeach
    @endif
</div>
@endsection
