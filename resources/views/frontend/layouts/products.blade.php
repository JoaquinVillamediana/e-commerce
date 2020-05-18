<div class="row">

    @foreach ($aProducts as $product)
        


    
    <div class="col">
          
          <div id="card" class="card mb-5" style="width: 18rem;">
            <a  href="{{route('product',$product->id)}}" id="productBox">
              
            <img class="card-img-top" src="/uploads/products/{{$product->image}}" alt="Card image cap">
            @if ($product->news == 1)
            <span class=" ml-3 badge badge-pill badge-danger">NUEVO</span>
            @endif
            <button id="favBtn_{{$product->id}}" class="favBtn"  onclick="setFavoriteProduct({{$product->id}})"><i  class="far fa-heart float-right mr-3 mt-1" style="font-size: 20px"></i></button>
            <button id="favBtnActive_{{$product->id}}" class="favBtnActive" onclick="setFavoriteProduct({{$product->id}})"><i  class="fas fa-heart float-right mr-3 mt-1" style="font-size: 20px"></i></button>
            <div class="card-body mt-0">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text text-dark">${{$product->price}}</p>
              
            </div>
          </a>
          </div>

        </div>


    @endforeach

  </div>


      <script type="text/javascript">


  
  function setFavoriteProduct(productId) {
      
      event.preventDefault();
     
      
      var params = new Object();
      params._token = "{{ csrf_token() }}";
      params.productId = productId;
      
      ajaxRequest("POST", "{{route('product_favorite')}}", params, "setFavoriteProductResponse");
  }
  
  function setFavoriteProductResponse(data) {
    
      if(data.favorite > 0) {
          $('#favBtnActive_'+data.productId).css('display', 'block');
          $('#favBtn_'+data.productId).css('display', 'none');
          
      } 
      else{
        $('#favBtnActive_'+data.productId).css('display', 'none');
        $('#favBtn_'+data.productId).css('display', 'block');
      }
  }
  
  function ajaxRequest(type, url, params, callBack) {

      jQuery.support.cors = true;
      params = JSON.stringify(params);

      $.ajax({
          type: type,
          url: url,
          data: params,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          beforeSend: function () {
              //$('#ajaxLoader').show();
          },
          complete: function () {
              //$('#ajaxLoader').hide();
          },
          success: function (data) {
             //console.log("REQUEST [ " + type + " ] [ " + url + " ] SUCCESS");
             //console.log(data);
              window[callBack](data);
          },
          error: function (msg, url, line) {
             //console.log('ERROR !!! msg = ' + msg + ', url = ' + url + ', line = ' + line);
          }
      });
  }



</script>