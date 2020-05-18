@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="/css/frontend/products.css">
<div class="mt-2 container-fluid">






    <div class="row pt-5 justify-content-center text-right">

      <div class="col ">
          <h2 class="text-center">{{$sub_category_name->name}}</h2>
      </div>
        {{-- <div class="col pl-0 mb-2">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_HirsSZ.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"    autoplay></lottie-player> --}}
</div>

    </div>


   @include('frontend/layouts.products')
</div>

@endsection
