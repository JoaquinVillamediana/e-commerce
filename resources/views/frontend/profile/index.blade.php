@extends('frontend/layouts.app')
<link rel="stylesheet" href="/css/frontend/products.css">





@section('content')
<div class="mt-5 pb-5 container-fluid">

<div class="card">

  <h5 class="card-header">   {{Auth::user()->last_name}}, {{Auth::user()->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{Auth::user()->dni}}</h5>
    <p class="card-text">{{Auth::user()->phone}}</p>
    <a href="#" class="btn btn-primary">Editar datos</a>
  </div>
  
</div>

</div>

   
@endsection
