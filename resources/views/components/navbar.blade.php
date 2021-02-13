<nav class="navbar navbar-dark ">
  <a class="navbar-brand" href="{{route('index')}}">Farmacity Ventas Hoy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="{{route('puntos')}}">Puntos</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">Acerca de</a> 
      </li>
      <li class="nav-item dropdown">
          <a  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{Auth::user()->name }}  <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
              <form  class= "text-white" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a clss="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();" 
                                                style="color: inherit; text-decoration: none; font-size:14px"> 
                                                Cerrrar Sesion
                            </a>
              </form>
          </div>
      </li>
    </ul>
  </div>

</nav>
