<!-- Footer -->
<div class="uou-block-4e">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6"> <a href="#" class="logo"><img src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg" alt=""></a>
        <ul class="contact-info has-bg-image contain" data-bg-image="#">
          <li> <i class="fa fa-map-marker"></i>
           <img src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/qr.jpg"> 
            <address>
            
            </address>
          </li>
          <li> <i class="fa fa-phone"></i> <a href="tel:#">(33) 15151516</a> </li>
          <li> <i class="fa fa-envelope"></i> <a href="mailto:contacto@todoparasuspies.com">contacto@todoparasuspies.com</a> </li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Twitter Feed</h5>
       
         <a class="twitter-timeline"
  href="https://twitter.com/todoparasuspies"
 
   data-tweet-limit="3">
Tweets by @todoparasuspies
</a>
        
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Photostream</h5>
        <ul class="photos-list">
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream4.jpg" alt=""></li>
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream6.jpg" alt=""></li>
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream3.jpg" alt=""></li>
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream2.jpg" alt=""></li>
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream1.jpg" alt=""></li>
          <li><img src="http://franquiciatario.todoparasuspies.com/socio-assets/images/photostream.jpg" alt=""></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h5>Newsletter</h5>
        <p>Subscribe to our newsletter to receive our latest news and updates. We do not spam.</p>
        <form class="newsletter-form" action="#">
          <input type="email" placeholder="Enter your email address">
          <input type="submit" class="btn btn-primary" value="Subscribe">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end .uou-block-4e -->

<div class="uou-block-4a secondary dark">
  <div class="container">
    <ul class="links">
      <li><a href="http://todoparasuspies.com/mx/privacy">Aviso de privacidad</a></li>
     
    </ul>
    <p>Copyright &copy; {{date('Y')}}<a href="http://todoparasuspies.com/mx/privacy"></a>. Todos los derechos reservados.</p>
  </div>
</div>
<!-- end .uou-block-4a -->

<div class="uou-block-11a">
  <h5 class="title">Menu</h5>
  <a href="#" class="mobile-sidebar-close">&times;</a>
  <nav class="main-nav">
   <ul>
            <li><a href="{{url('/user_profile')}}"><i class="fa  fa-home"></i></a></li>
 
            <li> <a href="#">Páginas</a>
              <ul>
                <li><a href="{{url('/crear_cita')}}">Crear una cita</a></li>
                <li><a href="http://todoparasuspies.com/">Todo Para Sus Pies</a></li>
               
                <li><a href="http://workadministra.com/">Tareas</a></li>
                <li><a href="http://143.255.56.90:8083/ASFACEDOCTA/">Estado de Cuenta</a></li>
                <li><a href="http://universidad.todoparasuspies.com/universidad/">Universidad TPSP</a></li>
                            
              </ul>
            </li>
             <li> <a href="{{url('/noticias')}}">Noticias</a></li>
                     <li> <a href="http://todoparasuspies.com/mx/blog-tpsp">Blog TPSP</a> </li>
   @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Ingresar</a></li>

                @elseif(\Entrust::hasRole('FRANQUICIATARIO'))
                   <li><a href="{{ url('user_profile') }}">{{ Auth::user()->name }}</a></li>
                 <li><a href="{{ url('/logout') }}"> Salir</a></li>
                    @elseif(\Entrust::hasRole('FRANQUICIATARIO_ADMIN'))
             <li><a href="{{ url(config('laraadmin.adminRoute')) }}">Admin</a></li>

              <li><a href="{{ url('user_profile') }}"> {{ Auth::user()->name }} </a></li>
 <li><a href="{{ url('/logout') }}"> Salir</a></li>

              @else
                    <li><a href="{{ url(config('laraadmin.adminRoute')) }}"> {{ Auth::user()->name }} </a></li>
             
                   
 <li><a href="{{ url('/logout') }}"> Salir</a></li>
                  
                @endif
             
            
          </ul>
  </nav>
  <hr>
</div>
