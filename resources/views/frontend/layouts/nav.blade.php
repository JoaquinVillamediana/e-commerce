<nav class="navbar navbar-expand-lg navbar-light bg-sea fixed-top border-bottom border-secondary" id="mainNav">
  <a class="navbar-brand" href="">E-COMMERCE</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav bg-sea "  id="exampleAccordion">
          <li class="nav-item border-top border-secondary" data-toggle="tooltip" data-placement="right" title="Home">
              <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-home"></i><span class="ml-2 nav-link-text"  >Home</span>
              </a>
          </li>
          
          <li class="nav-item border-top border-bottom border-secondary">
            <a href="#CatSubmenu" data-toggle="collapse" class="nav-link" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-bars mr-2"></i>Categorias</a>
              <ul class="collapse list-unstyled"  id="CatSubmenu">
                  @foreach ($aCategories as $category)
                      @if ($category->quantity_sub < 1)
                      <li><a class="nav-link ml-3" href="{{route('cate',$category->id)}}" style="font-size:16px"><i class="fas fa-th-large mr-1"></i>{{$category->name}}</a></li>
                      @else
                      <li class="nav-item">
                        <a href="#SubCatSubmenu_{{$category->id}}" style="font-size:16px" data-toggle="collapse" class="nav-link ml-3" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-th-large mr-1"></i>{{$category->name}}</a>   
                        </a>
                        <ul class="collapse list-unstyled" id="SubCatSubmenu_{{$category->id}}">
                          @foreach ($aSubCategories as $subcategory)
                            @if ($subcategory->category_id == $category->id)
                              <li> <a class="nav-link ml-4" style="font-size:15px" href="{{route('sub',$subcategory->id)}}"><i class="fas fa-th mr-1"></i>{{$subcategory->name}}</a></li>
                            @endif
                          @endforeach
                      </ul>
                    </li>
                      @endif
                  @endforeach
                  
              </ul>
          </li>
          <li class="nav-item border-bottom border-secondary" data-toggle="tooltip" data-placement="right" title="Home">
            <a class="nav-link" href="#">
              <i class="fas fa-tags"></i></i><span class="ml-2 nav-link-text"  >Ofertas</span>
            </a>
        </li>
        
          


      </ul>
      {{-- <ul class="navbar-nav bg-secondary sidenav-toggler">
        <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
            </a>
        </li>
    </ul> --}}
      
      <ul class="navbar-nav mr-5 ml-auto" >
        @if (empty(Auth::user()->id))
        <li class="nav-item ml-md-3  border-dark"><a  class="nav-link" href="{{ route('loguser.index') }}">Ingresar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register.index') }}">Registarme</a></li>
            @else
            <li class="nav-item dropdown  ml-3 ">
              
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu text-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-dark"  href="#">Perfil</a>
                <a class="dropdown-item text-dark"  href="#">Compras</a>
                <a class="dropdown-item text-dark"  href="#">Favoritos</a>
                <a class="dropdown-item text-dark"  href="#">Carrito</i></a>
                
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Salir</a>
              </div>
            </li>
            @endif
      </ul>
  </div>
</nav>
@if (!Auth::guest())
    

@if (Auth::user()->type == 1)
<a id="back-to-backend" href="{{route('user.index')}}" class="btn btn-dark btn-lg back-to-backend" role="button">Backend</a>
<script>
  $(document).ready(function(){
	
				$('#back-to-backend').fadeIn();
		// scroll body to 0px on click
});
</script>
@endif
@endif

