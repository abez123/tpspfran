 <!-- Top Toolbar -->
  <div class="toolbar">
    <div class="uou-block-1a blog">
      <div class="container">
        <div class="search"> <a href="#" class="toggle fa fa-search"></a>
          <form action="#">
            <input type="text" class="search-input" placeholder="Search ...">
            <input type="submit" value="">
          </form>
        </div>
        <ul class="social">
          <li><a href="https://www.facebook.com/TodoparasusPiesMX/" class="fa fa-facebook"></a></li>
          <li><a href="https://twitter.com/todoparasuspies" class="fa fa-twitter"></a></li>
          <li><a href="https://www.youtube.com/channel/UC_Isub0CgYXzwxCNmFxvycg" class="fa fa-youtube"></a></li>
           <li><a href="https://www.instagram.com/todoparasuspies/" class="fa fa-instagram"></a></li>
        </ul>
        <ul class="authentication">
           @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Ingresar</a></li>

                @elseif(\Entrust::hasRole('FRANQUICIATARIO'))
                   <li><a href="{{ url('user_profile') }}">{{ Auth::user()->name }}</a></li>
                
                    @elseif(\Entrust::hasRole('FRANQUICIATARIO_ADMIN'))
             <li><a href="{{ url(config('laraadmin.adminRoute')) }}">Admin</a></li>

              <li><a href="{{ url('user_profile') }}"> {{ Auth::user()->name }} </a></li>


              @else
                    <li><a href="{{ url(config('laraadmin.adminRoute')) }}"> {{ Auth::user()->name }} </a></li>
             
                   

                  
                @endif

                   <li><a href="{{ url('/logout') }}"> Salir</a></li>
      
        </ul>
 
      </div>
    </div>
    <!-- end .uou-block-1a --> 
  </div>
  <!-- end toolbar -->