<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="">E-COMMERCE</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
              <a class="nav-link" href="">
                  <span class="nav-link-text">Home</span>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="#CatSubmenu" data-toggle="collapse" class="nav-link" aria-expanded="false" class="dropdown-toggle">Categorias</a>
              <ul class="collapse list-unstyled" id="CatSubmenu">
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
      <ul class="navbar-nav ">
          <li class="nav-item">
              
          </li>
      </ul>
      
      <ul class="navbar-nav mr-5 ml-auto">
        @if (empty(Auth::user()->id))
        <li class="nav-item ml-3 border-right border-dark"><a  class="nav-link" href="{{ route('loguser.index') }}">Ingresar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register.index') }}">Registarme</a></li>
            @else
            <li class="nav-item dropdown ml-3">
              
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{Auth::user()->name}} <i class="fas fa-angle-down  pt-1"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="#">Mi Perfil</a>
                
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Salir</a>
              </div>
            </li>
            @endif
      </ul>
  </div>
</nav>