@include('layouts.partials.htmlheader')
<body>
<div id="main-wrapper"> 
  
  @include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
  <!-- HOME PRO-->
  <div class="home-pro"> 
    
    <!-- PRO BANNER HEAD -->
    <div class="banr-head">
      <div class="container">
        <div class="row"> 
          
          <!-- CONTENT -->
          <div class="col-sm-7">
            <div class="text-area">
              <div class="position-center-center col-md-10">
               
               
              </div>
            </div>
          </div>
          
          <!-- FORM SECTION -->
          <div class="col-sm-5">
            <div class="login-sec"> 
              
              <!-- TABS -->
              <div class="uou-tabs">
                <ul class="tabs">
                 
                  <li class="active"><a href="#log-in">Ingreso Franquiciatario</a></li>
                </ul>
                
           
                  
                  <!-- LOGIN -->
                  <div id="log-in" class="active">
                    @if (Auth::guest())
                    <form action="{{ url('/login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="email" name="email" placeholder="Email Address">
                      <input type="password" name="password" placeholder="Password">
                      <button type="submit">Ingresar</button>
                     
                      <div class="forget">¿Olvidó su contraseña? <a href="{{ url('/password/reset') }}">Entra aqui</a></div>
                      
                    </form>
                  @elseif(\Entrust::hasRole('FRANQUICIATARIO'))
                <li><a href="{{ url('user_profile') }}">{{ Auth::user()->name }}</a></li>
                 
                        <li><a href="{{ url('/logout') }}">Salir</a></li></ul>
                  @elseif(\Entrust::hasRole('FRANQUICIATARIO_ADMIN'))
             <li><a href="{{ url(config('laraadmin.adminRoute')) }}">Admin</a></li>

              <li><a href="{{ url('user_profile') }}"> {{ Auth::user()->name }} </a></li>
                   <li><a href="{{ url('/logout') }}">Salir</a></li></ul>
               @else
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                       <li><a href="{{ url('/logout') }}">Salir</a></li></ul>  
                @endif
             
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   
    
    <!-- PRO SECTION -->
    <section class="pro-content">
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- PRO IMAGE -->
          <div class="col-md-6 pro-inside" style="background:url(../socio-assets/images/pro-img-1.jpg) center center no-repeat;"></div>
          
          <!-- PRO CONTENT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Reportes Especializados</h1>
              <p> Reportes para tomar decisiones importantes. Reportes de ventas por semana, mes y año. Tambíen por pedicurista y sucursales </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- PRO SECTION -->
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- PRO TEXT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Recibe Notificaciones Importantes</h1>
              <p> Les enviamos noticas importantes parala mejora continua de su frnaquicia Todo Para Sus Pies </p>
            </div>
          </div>
          
          <!-- PRO BACKGROUND -->
          <div class="col-md-6 pro-inside" style="background:url(../socio-assets/images/pro-img-2.jpg) center center no-repeat;"></div>
        </div>
      </div>
    </section>
    
    <!-- APP IMAGE -->
    <section class="app-images">
      <div class="container">
        <div class="row"> 
          
          <!-- TEXT -->
          <div class="col-md-6 text-center text-area">
            <h1>Se adapta a su Smartphone</h1>
            <p>La plataforma se adapta a cualquier dispositivo.</p>
            </div>
          
          <!-- APP IMAGE -->
          <div class="col-md-6 text-right"><img src="../socio-assets/images/app-img.png" alt="" > </div>
        </div>
      </div>
    </section>
    
    <!-- TESTIMONIALS -->
    <section class="clients-says">
      <div class="container">
        <h3 class="section-title">que dicen nuestros franquiciatarios </h3>
        <div class="testi">
          <div class="texti-slide"> 
            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Es una manera de poder estar informado de los más importante para mi franquicia</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="#."> <img src="../socio-assets/images/picnacho.png" alt=""> </a> </div>
                <div class="media-body">
                  <h6>Ignacio GP</h6>
               </div>
              </div>
            </div>
            
            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Puede organizar mi franquicia de una manera mucha más efectiva. Muchas Gracias</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="#."> <img src="../socio-assets/images/picomar.png" alt=""> </a> </div>
                <div class="media-body">
                  <h6>Omar Garcia P</h6>
                </div>
              </div>
            </div>
            

          </div>
        </div>
      </div>
    </section>
    
    <!-- sponsors -->
    <div class="sponsors" style="background:url(../socio-assets/images/sponser-bg.jpg) no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Franquicias Destacadas</h3>
            <div class="sponsors-slider">
              <div class="item"><img src="../socio-assets/images/sponsor_logo1.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo2.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo3.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo5.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo6.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../socio-assets/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

</body>


</html>