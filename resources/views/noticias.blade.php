@include('layouts.partials.htmlheader')
<body>
<div id="main-wrapper"> 
  @include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">
        <h2>Noticias</h2>
      </div>
    </div>
  </div>
     <div class="profile-company-content user-profile main-user" data-bg-color="f5f5f5">
      <div class="container">
        <div class="row"> 
            <!-- Nav Tabs -->
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active"><a  href="{{url('/user_profile')}}">Perfil</a></li>
              <li><a  href="{{url('/user_profile#factura')}}">Facturas</a> </li>
               <li><a  href="{{url('/user_profile#reportes')}}">Reportes</a></li>
             
                  <li><a  href="{{url('/citasver')}}">Citas</a></li>
                  <li><a data-toggle="tab" href="#noticias">Noticias</a></li>
              
               <li><a  href="{{url('/user_profile#docus')}}">Documentos</a></li>
              <!--<li><a data-toggle="tab" href="#contacto">Contacto</a></li>-->
              <li><a href="{{url('/user_profile#tareas')}}">Tareas</a></li>         
              <li><a  href="{{url('/user_profile#enlaces')}}">Enlaces</a></li>    
              <li><a  href="{{url('/encuestas')}}">Encuestas</a></li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
  <div class="blog-content pt60">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          @foreach($noticias as $noticia)
        <?php $imgs = \App\Models\Upload::find($noticia->imagen); ?>
          <article class="uou-block-7f"> <img src="{{$imgs->path()}}" alt="" class="thumb">
            <div class="meta"> <span class="time-ago">{{date("F jS, Y", strtotime($noticia->created_at))}}</span> <span class="category">Escrito por: <a href="#">TPSP</a></span> <a href="#" class="comments"></a> </div>
            <h1><a href="{{url('/noticia/'.$noticia->id)}}">{{$noticia->titulo}}</a></h1>
            <p>{!!$noticia->text!!}</p>
            <a href="{{url('/noticia/'.$noticia->id)}}" class="btn btn-small btn-primary">Leer más</a> </article>
          <!-- end .uou-block-7f -->         
     
      @endforeach
    
          
          <div class="text-center pt20">
            <ul class="uou-paginatin list-unstyled">
             
               <li>{{$noticias->links()}}</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="uou-sidebar">
            <div class="search-widget">
              <form class="search-form-widget" action="#">
                <input type="text" class="search-input" placeholder="Search ...">
                <input type="submit" value="">
              </form>
            </div>
            <!-- end search-widget -->
            
            <h5 class="sidebar-title">Categories</h5>
            <div class="list-widget">
              <ul>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">Mulitmedia</a></li>
                <li><a href="#">Offtopic</a></li>
              </ul>
            </div>
            <h5 class="sidebar-title">About Us</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</p>
            <h5 class="sidebar-title">Connect With Us</h5>
            <div class="social-widget">
              <div class="uou-block-4b">
                <ul class="social-icons">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </div>
              <!-- end .uou-block-4b --> 
            </div>
            <!-- end social widget -->
            
            <h5 class="sidebar-title">Popular Posts</h5>
            <div class="latest-post-widget">
              <div class="post-single"> <img src="img/p-post-1.png" alt="">
                <p class="meta">January 12, 2015</p>
                <p class="meta">Design</p>
                <h6 class="post-title"><a href="#">Pariatur Vellit Corrupti Goes Into 2 Lines</a></h6>
              </div>
              <div class="post-single"> <img src="img/p-post-2.png" alt="">
                <p class="meta">January 12, 2015</p>
                <p class="meta">Design</p>
                <h6 class="post-title"><a href="#">Pariatur Vellit Corrupti Goes Into 2 Lines</a></h6>
              </div>
              <div class="post-single"> <img src="img/p-post-3.png" alt="">
                <p class="meta">January 12, 2015</p>
                <p class="meta">Design</p>
                <h6 class="post-title"><a href="#">Pariatur Vellit Corrupti Goes Into 2 Lines</a></h6>
              </div>
            </div>
            <!-- end latest-post-widget -->
            
            <h5 class="sidebar-title">Tag Cloud</h5>
            <div class="widget-tag">
              <div class="tag-cloud"> <a class="btn btn-primary" href="#">User Experience</a> <a class="btn btn-primary" href="#">HTML 5</a> <a class="btn btn-primary" href="#">Css 3</a> <a class="btn btn-primary" href="#">web design</a> <a class="btn btn-primary" href="#">social media</a> <a class="btn btn-primary" href="#">web development</a> <a class="btn btn-primary" href="#">print design</a> <a class="btn btn-primary" href="#">e-commerce</a> <a class="btn btn-primary" href="#">java script</a> </div>
            </div>
            <h5 class="sidebar-title">Archive</h5>
            <div class="list-widget">
              <ul>
                <li><a href="#">May 2015</a></li>
                <li><a href="#">April 2015</a></li>
                <li><a href="#">July 2015</a></li>
                <li><a href="#">Frbruary 2015</a></li>
                <li><a href="#">January 2015</a></li>
              </ul>
            </div>
          </div>
          <!-- end uou-sidebar --> 
        </div>
      </div>
      <!-- end row --> 
      
    </div>
    <!-- edn cotainer --> 
    
  </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.scripts')
</body>
</html>