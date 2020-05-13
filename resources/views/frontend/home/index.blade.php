@extends('frontend/layouts.app')

@section('content')
<div class="mt-5 pb-5 container-fluid">
    <div class="row pt-5 justify-content-center text-right">
      @if (!empty($aProducts))
          
  
      <div class="col-3 offset-md-2" style="color: #4790de">
        <h1>Novedades</h1>
        </div>
        <div class="col-1 pl-0">
          
          <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
          <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qznxcZ.json"  background="transparent"  speed="1"  style="width: 50px; height: 50px;"    autoplay></lottie-player>
        </div>
        
    </div>
    <div class="row">
      @foreach ($aProducts as $product)
          
      @endforeach

    </div>

    @endif
</div>
@endsection
