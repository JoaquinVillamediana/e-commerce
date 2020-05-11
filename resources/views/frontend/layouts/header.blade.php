<nav class="navbar navbar-expand-md px-5 navbar-light bg-light">
  <a class="navbar-brand" href="#">E-Commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

      
      <li class="nav-item dropdown">
        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="#" class="dropdown-item">Some action </a></li>
          <li><a href="#" class="dropdown-item">Some other action</a></li>

          <li class="dropdown-divider"></li>

          <!-- Level two dropdown-->
          <li class="dropdown-submenu">
            <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
            <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
              <li>
                <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
              </li>

              <!-- Level three dropdown-->
              <li class="dropdown-submenu">
                <a id="dropdownMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                <ul aria-labelledby="dropdownMenu3" class="dropdown-menu border-0 shadow">
                  <li><a href="#" class="dropdown-item">3rd level</a></li>
                  <li><a href="#" class="dropdown-item">3rd level</a></li>
                </ul>
              </li>
              <!-- End Level three -->

              <li><a href="#" class="dropdown-item">nivel 2</a></li>
              <li><a href="#" class="dropdown-item">level 2</a></li>
            </ul>
          </li>
          <!-- End Level two -->
        </ul>
      </li>
      <!-- End Level one -->




      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      @if (empty(Auth::user()->id))
      <li class="nav-item ml-3 border-right border-dark"><a class="nav-link" href="#">Ingresar</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Registarme</a></li>
      @else
      <li class="nav-item dropdown ml-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mi Perfil</a>
          <a class="dropdown-item" href="{{ route('logout') }}">Salir</a>
        </div>
      </li>
      @endif
    </ul>
    
  </div>
</nav>
<script>
$(function() {
  // ------------------------------------------------------- //
  // Multi Level dropdowns
  // ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");


    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });

  });
});
</script>