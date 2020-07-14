@extends('frontend/layouts.app')

@section('content')

<div class=" container-fluid">





  <div class="row pt-2 justify-content-center text-right">
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-md-4 col-12">
        <h2 class="text-center" id="headFav" style="    position: absolute;top: 100px;left: 100px;z-index: 2;display:none">CONTACTO</h2>
        
    
    </div>
    <div class="col-4 d-none d-lg-block d-xl-block d-md-block">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/temp/lf20_adfZjR.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
  </div>

  <div class="row justify-content-center text-right">
  <div class="row justify-content-center text-right">
      
                <div class="row justify-content-center text-right">
                    <div class="col-lg-8 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="{{ route('contact_post') }}" id="task_form" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                           

                           

                            <div class="row">

                               
                                    <label>Problema</label>
                                    <select class="form-control" name="contacts_type" id="contacts_type">
                                       
                                            <option value="1">No llego mi envio</option>
                                            <option value="2">Producto fallado</option>
                                            <option value="3">No era lo que esperaba</option>
                                            <option value="4">Otro</option>
                                    </select>
                                    @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Debe seleccionar una problema valido.</strong>
                                    </span>
                                    @endif
                                  

                                {{-- ajax --}}

                             
                            </div>


                            <div class="form-group">
                                <label>Comentario</label>
                              
                                <input type="text" id="description" name="description"/>
                                <div id="editor-container" style="border:1px solid #ced4da; border-radius:.25rem; margin-top:5px;">{!! old('description') !!}</div>
                                <span id="description_error" class="invalid-feedback" role="alert" style="display:none;">
                                    <strong>Debe ingresar una descripción (max. 12000 car.)</strong>
                                </span>                                
                            </div>  



                           

                           
                  

                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                  
                </div>
  </div>

</div>
<script>$( document ).ready(function() {
  $('#headFav').fadeIn(400);
});</script>
@endsection
