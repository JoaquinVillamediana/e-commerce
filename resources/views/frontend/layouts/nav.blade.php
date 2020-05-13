<nav class="navbar navbar-expand-lg navbar-light bg-sea fixed-top" id="mainNav">
  <a class="navbar-brand" href="">E-COMMERCE</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav bg-sea "  id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
              <a class="nav-link" href="{{route('home')}}">
                  <span class="nav-link-text"  >Home</span>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="#CatSubmenu" data-toggle="collapse" class="nav-link" aria-expanded="false" class="dropdown-toggle">Categorias</a>
              <ul class="collapse list-unstyled"  id="CatSubmenu">
                  @foreach ($aCategories as $category)
                      @if ($category->quantity_sub < 1)
                      <li><a class="nav-link" href="#">{{$category->name}}</a></li>
                      @else
                      <li class="nav-item">
                        <a href="#SubCatSubmenu_{{$category->id}}" data-toggle="collapse" class="nav-link" aria-expanded="false" class="dropdown-toggle">{{$category->name}}</a>   
                        </a>
                        <ul class="collapse list-unstyled" id="SubCatSubmenu_{{$category->id}}">
                          @foreach ($aSubCategories as $subcategory)
                            @if ($subcategory->category_id == $category->id)
                              <li><a class="nav-link" href="#">{{$subcategory->name}}</a></li>
                            @endif
                          @endforeach
                      </ul>
                    </li>
                      @endif
                  @endforeach
                  
              </ul>
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
            <li class="nav-item dropdown  ml-3 text-dark">
              
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="#">Perfil</a>
                <a class="dropdown-item"  href="#">Compras</a>
                <a class="dropdown-item"  href="#">Favoritos</a>
                <a class="dropdown-item"  href="#">Carrito</i></a>
                
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Salir</a>
              </div>
            </li>
            @endif
      </ul>
  </div>
</nav>