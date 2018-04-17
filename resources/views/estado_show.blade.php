@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Factura Detalle</h2>
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
 

<div class="box">
 
  <div class="box-body">
    <div class="row">


                        @la_display($module, 'xml')
                    </div>
                </div>
            </div>
            <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'pdf')
                                </div>
                </div>
            </div>
               
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'nombre')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'rfc')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'usocfdi')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'clave')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'cantidad')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'claveunidad')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'descripcion')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'valorunitario')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'importe')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'impuesto')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'fecha')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'formapago')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'folio')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'moneda')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'mes')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'year')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'emisornombre')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'emisorrfc')
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
                        @la_display($module, 'emisorregimen')
                             </div>
                </div>
            </div>
             </div>
             <br>
 </div>
</div>
</div>



<!-- end #main-wrapper -->

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>



<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
