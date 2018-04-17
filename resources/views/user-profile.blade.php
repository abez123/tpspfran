@include('layouts.partials.htmlheader')



<body>
<div id="main-wrapper"> 
  
  <!-- Top Toolbar -->
 @include('layouts.partials.top_toolbar')  
  <!-- end toolbar -->
  
 @include('layouts.partials.navmenu')  
  <div class="compny-profile"> 
    <!-- SUB Banner -->
    <div class="profile-bnr user-profile-bnr">
      <div class="container">
        <div class="pull-left">
          @foreach($franquiciatarios as $franquiciatario)
          <h2>{{$franquiciatario->nombrecompletofran}}</h2>
          <h5>{{$franquiciatario->correofran}}</h5>
          @endforeach
        </div>
        
        <!-- Top Riht Button -->
        <div class="right-top-bnr">
          <div class="connect"> <a href="#." data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-user-plus"></i> Contacto</a> 
            <div class="bt-ns"> <a href="#."><i class="fa fa-bookmark-o"></i> </a> <a href="#."><i class="fa fa-envelope-o"></i> </a> <a href="#."><i class="fa fa-exclamation"></i> </a> </div>
          </div>
        </div>
      </div>
      
      <!-- Modal POPUP -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="container">
              <h6><a class="close" href="#." data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a> Envíanos un mensaje</h6>
              
              <!-- Forms -->
              <form action="#">
                <ul class="row">
                    @foreach($franquiciatarios as $franquiciatario)
                  <li class="col-xs-6">
             <label>Nombre:</label>
                    <input type="text" value="{{$franquiciatario->nombrecompletofran}}" readonly>
                  </li>
              
                  <li class="col-xs-6">
                      <label>Correo:</label>
                    <input type="text" value="{{$franquiciatario->correofran}}" readonly>
                  </li>
                  <li class="col-xs-12">
                      <label>Mensaje:</label>
                    <textarea placeholder="Su mensaje"></textarea>
                  </li>
                  <li class="col-xs-12">

                    <button class="btn btn-primary">Enviar mensaje</button>
                  </li>
                  @endforeach
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Profile Company Content -->
    <div class="profile-company-content user-profile main-user" data-bg-color="f5f5f5">
      <div class="container">
        <div class="row"> 
          
          <!-- Nav Tabs -->
          <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a data-toggle="tab" href="#profile">Perfil</a></li>
              <li><a data-toggle="tab" href="#factura">Facturas</a> </li>
               <!-- <li><a data-toggle="tab" href="#reportes">Reportes</a></li>-->
             
                 <!--  <li><a href="{{url('/citasver')}}">Citas</a></li>-->
                  <li><a  href="{{url('/noticias')}}">Noticias</a></li>
              
               <li><a data-toggle="tab" href="#docus">Documentos</a></li>
             <!-- <li><a data-toggle="tab" href="#contacto">Contacto</a></li>-->
               <li><a  href="{{url('/peticiones')}}">Peticiones</a></li>         
              <li><a data-toggle="tab" href="#enlaces">Enlaces</a></li>    
              <li><a  href="{{url('/encuestas')}}">Encuestas</a></li>
             
            </ul>
          </div>
          
          <!-- Tab Content -->
          <div class="col-md-12">
            <div class="tab-content"> 
  <!-- __________________________________________________________________________- -->   
              <!-- PROFILE -->
              <div id="profile" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile-main">
                        @foreach($franquiciatarios as $franquiciatario)
          <h3>{{$franquiciatario->nombrecompletofran}}</h3>
       
          @endforeach
                     
                      <div class="profile-in">
                        <div class="media-left">
                          @foreach($franquiciatarios as $franquiciatario)
                   <?php $imgs = \App\Models\Upload::find($franquiciatario->imagenfran); ?>
                          <div class="img-profile"> <img class="media-object" src="{{$imgs->path()}}" alt=""> </div>
                          @endforeach
                        </div>
                        <div class="media-body">
                          <h3>Sucursales</h3>
                           <ul class="row">
            
                          @foreach($sucursales as $sucursal)
                         <li class="col-sm-3">
                         <h6>Todo Para Sus Pies<img width="30px" src="{{asset('socio-assets/images/trademark.png')}}" alt="R"> {{$sucursal->nombresuc}}</h6> 
                        </li>
                         @endforeach
                         </ul>
                     
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8"> 
                    
                    <!-- Skills -->
                    <div class="sidebar">
                      <h5 class="main-title">Pendientes</h5>
                      <div class="job-skills"> 
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Contrato</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> </div>
                            </div>
                          </li>
                        </ul>
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> SAE</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> </div>
                            </div>
                          </li>
                        </ul>
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Capacitación</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"> </div>
                            </div>
                          </li>
                        </ul>
               
                      </div>
                    </div>
                    
                    <!-- Professional Details -->
                    <div class="sidebar">
                      <h5 class="main-title">Citas</h5>
                      
                      <!-- Similar -->
                      <div class="similar">
                        <div class="media">
                          <div class="media-left">
                            <div class="inn-simi"> <img class="media-object" src="{{$imgs->path()}}" alt=""> <a href="{{url('/crear_cita')}}">Crear Cita </a> </div>
                          </div>
                          <div class="media-body">
                           <canvas id="myChart" ></canvas>
                      
                          </div>
                        </div>
                        
                     
               
                      </div>
                    </div>
                  </div>
                  
                  <!-- Col -->
                  <div class="col-md-4"> 
                    
                    <!-- Professional Details -->
                    <div class="sidebar">
                        @foreach($franquiciatarios as $franquiciatario)
                      <h5 class="main-title">Sus Datos en Sistema</h5>
                      <div class="sidebar-information">
                        <ul class="single-category">
                         
                          <li class="row">
                            
                            <h6 class="title col-xs-6">Nombre</h6>
                            <span class="subtitle col-xs-6">{{$franquiciatario->nombrecompletofran}}</span></li>
                      
                        
                          <li class="row">
                            <h6 class="title col-xs-6">Domicilio</h6>
                            <span class="subtitle col-xs-6"> <a target="_blank"  href="{!!"http://maps.google.com/?q=".$franquiciatario->domiciliofran!!}" 
                              data-toggle="tooltip" data-placement="left"><i class="fa fa-map-marker"></i>{!!$franquiciatario->domiciliofran!!} </a></span></li>
                      
                        
                          <li class="row">
                            <h6 class="title col-xs-6">RFC</h6>
                            <span class="subtitle col-xs-6">{{$franquiciatario->rfc}}</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Teléfono</h6>
                            <span class="subtitle col-xs-6">{{$franquiciatario->celularfran}}</span></li>
                        
                          <li class="row">
                            <h6 class="title col-xs-6">E-mail</h6>
                            <span class="subtitle col-xs-6"><a href="#.">{{$franquiciatario->correofran}}</a></span></li>
                             @endforeach
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Rating -->
                    <div class="sidebar">
                      <h5 class="main-title">Encuesta</h5>
                      <div class="sidebar-information">
                        <ul class="single-category com-rate">
                          <li class="row">
                            <h6 class="title col-xs-6">Servicio:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Facturación:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Calidad:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Precios:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Entregas:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Social Profiles -->
                    <div class="sidebar">
                      <h5 class="main-title">Perfiles Sociales TPSP</h5>
                      <ul class="socil">
                        <li><a href="https://www.facebook.com/TodoparasusPiesMX/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/todoparasuspies/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UC_Isub0CgYXzwxCNmFxvycg"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://twitter.com/todoparasuspies"><i class="fa fa-twitter"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>


     <!-- __________________________________________________________________________- -->
                 <!-- Facturación -->
              <div id="factura" class="tab-pane fade">
                <div class="header-listing">
                  <h6>Últimas 4 facturas</h6>
                
                 
                </div>
                <div class="listing listing-1">
                  <div class="listing-section">
                      <button type="button"><a href="{{url('estado_cuenta')}}">Ver el estado de cuenta</a></button> 
                      <br>
                        <br>
                    @foreach($facturasxmls as $facturasxml)
                    <div class="listing-ver-3">


                      <div class="listing-heading">
                        <h5>Fecha: {{$facturasxml->fecha}}</h5>
                        &nbsp;
                       <h5>Emisor: {{$facturasxml->emisornombre}}</h5>
                    
                      
                      </div>
                      <div class="listing-inner">
                        <div class="listing-content">
                          <h6 class="title-company">Folio: {{$facturasxml->folio}}</h6>
                            <h6 class="title-company">A Nombre: {{$facturasxml->nombre}}</h6>
                   
                        <h6 class="title-company">Estatus: {{$facturasxml->estatus}}</h6>
                     <h6 class="title-company">RFC: {{$facturasxml->rfc}}</h6>
                          <h6 class="title-company">Descripción: {{$facturasxml->descripcion}}</h6>
                         <h6>Subtotal: ${{$facturasxml->subimporte}}</h6>
                          <h6>I.V.A: {{$facturasxml->impuesto}} </h6>
                           <h6>Total: {{$facturasxml->importe}} </h6>
                          <h6 class="title-tags">Descargar Facturas:</h6>
                          <ul >
              
                            <li><a href="{{$xmls}}">descargar xml </a></li>
                             <li><a href="{{$pdfs}}">descargar pdf </a></li>
              
                          </ul>
                        </div>
                      </div>
                      <div class="listing-tabs">
                        <ul>
 


                          <li><a href="{{url('/facturaxmls/'.$facturasxml->id)}}"><i class="fa fa-globe"></i> Moneda: {{$facturasxml->moneda}}  </a></li>
                           <li><a href="{{url('/facturaxmls/'.$facturasxml->id)}}"><i class="fa fa-globe"></i> Ver Detalle:  </a></li>
  
                         
                            <li><a href="{{url('/facturaxmls/'.$facturasxml->id)}}"><i class="fa fa-globe"></i> Clave: {{$facturasxml->clave}} </a></li>
                        
                                      

                

                            <li><a href="#"><i class="fa fa-star"></i> Año: {{$facturasxml->year}}</a></li>
                    

                     
                     

                        </ul>
                      </div>
                    </div>
               @endforeach
                         <div class="text-center pt20">
                          <ul class="uou-paginatin list-unstyled">
                        <li>{{ $facturasxmls->fragment('factura')->links() }}</li>


                          </ul>
                        </div>
                 
                  </div>
                </div>
              </div>
  <!-- __________________________________________________________________________- -->
    <!-- Estado de cuenta -->
              <div id="reportes" class="tab-pane fade">
                <div class="header-listing">
                  <h6>Reportes</h6>
                 
                
                </div>
                <div class="listing listing-1">
                  <div class="listing-section">
               <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$sucursalescnt}}</h3>
                  <p>Sucursales</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>
               
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$pedicuristascnt}}<sup style="font-size: 20px"></sup></h3>
                  <p>Pedicuristas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-people"></i>
                </div>
              
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>440,000</h3>
                  <p>Ingresos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-social-usd-outline"></i>
                </div>
                
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3> {{$citaspagadas}}</h3>
                  <p>Citas Pagadas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
             
              </div>
            </div><!-- ./col -->
               
          </div><!-- /.row -->
      
        </section>
                         <div class="text-center pt20">
                         <a  href="{{url('/reportes')}}">Ver + reportes</a>  
                        </div>
                 
                  </div>
                </div>
              </div>
  <!-- _________________________________________________________________________________- --> 
           
              <!-- Enlaces -->
              <div id="enlaces" class="tab-pane fade">

                <div class="profile-main">
                  <h3>Enlaces</h3>
                  <div class="profile-in">
                    <p>Aquí podrás ver todas las enlaces que corresponde  Todo Para Sus Pies.</p>
                    @foreach($enlaces as $enlace)
        <h3><a href="{{$enlace->enlace}}" target="_blank">{{$enlace->nombrenenlace}}  {!!$enlace->descripcion!!}</a></h3>
                
                   @endforeach

        {{ $enlaces->fragment('enlaces')->links() }}
                 
                  </div>
                </div>
              </div>
 
 <!-- _________________________________________________________________________________- -->
           
              <!-- Contacto -->
              <div id="contacto" class="tab-pane fade">

                <div class="profile-main">
                  <h3>Contacta el Corporativo</h3>
                  <div class="profile-in">
                    <p>Envíanos un mensaje y lo atendaremos lo más pronto posible. Muchas Gracias.</p>
                    <form action="#">
                      <input type="text" placeholder="Asunto">
                     
                      <textarea placeholder="Su mensaje"></textarea>
                      <button class="btn btn-primary">Enviar Mensaje</button>
                    </form>
        
                 
                  </div>
                </div>
              </div>
 <!-- _________________________________________________________________________________- -->  


              <!-- Tares -->
              <div id="tareas" class="tab-pane fade">
            
                <div class="profile-main">
                  <h3>Datos del/proyecto/tarea/actividad</h3>
           
                    <form action="#">
                         <div class='col-sm-6'>
           <div class="form-group">
              <label>Fecha Inicio:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" placeholder="Fecha de inicio*" required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
      </div>
                <br>
                 <label>Hora Inicio:</label>
                <div class='input-group time' id='datetimepicker2'>
                    <input type='time' class="form-control" placeholder="Fecha de inicio*" required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                  </div>
       
        </div>
         <br>
           <div class="form-group">
                 <label>Fecha de Entrega:</label>
                 <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" placeholder="Fecha de entrega*" required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
      </div>
                 <br>
                 <label>Hora de Entrega:</label>
                <div class='input-group time' id='datetimepicker4'>
                    <input type='time' class="form-control" placeholder="Fecha de inicio*" required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
   
  </div>
</div>
</div>

 <div class='col-sm-6'>
      
      <div class="form-group">
 <label>Prioridad *:</label>
        <select style="width: 50%" class="form-control select2" name="prioridad" required>
         
          <option value="">Seleccione</option>
          <option value="Normal">Normal</option>
           <option value="Urgente">Urgente</option>
            <option value="Critico">Critico</option>
         
        </select> 
  <br>
 <label>Tipo * :</label>
          <select style="width: 50%" class="form-control select2" name="tipo" required>
           
          <option value="">Seleccione</option>
          <option value="Ventas">Ventas</option>
           <option value="Proceso">Proceso</option>
            <option value="Actividad">Actividad</option>
         
        </select> 

</div>
</div>
     <div class='col-sm-12'>
      <div class="form-group">
          <label>Nombre del proyecto: *</label>
                      <input type="text" placeholder="Nombre del proyecto/tarea/actividad" required="true">
                    
                      <label>Descripción: *</label>
                      <textarea name="descripcion" placeholder="Descripción del proyecto/tarea/actividad" rows="4" cols="50"></textarea>
                   <br>
                      <label>¿Qué se requiere?: *</label>
                      <textarea name="descripcion" placeholder="¿Qué se requiere para realizarr el proyecto/tarea/actividad?" rows="4" cols="50"></textarea>

                   <br>
                      <label>Asignar a persona * :</label>
          <select style="width: 50%" class="form-control select2" name="tipo" required>
           
          <option value="">Seleccione</option>
      
           <option value="Osiris Ruvalcaba">Osiris Ruvalcaba</option>
            <option value="Almendra">Almendra Rivera Galván</option>
            <option value="Alejandra Valenzuela">Alejandra Valenzuela</option>
         
        </select> 
    <br>
        <label>Archivo </label>
        <input type="file" name="file">
       
      <br>
      
</div>
                      <button class="btn btn-primary">Enviar Tarea</button>
              </div>      

  
                    </form>

                </div>
              </div>
         

            


 <!-- _________________________________________________________________________________- -->
          <!-- Documento-->
              <div id="docus" class="tab-pane fade">
              <h2>Documentos </h2>
<h3>selecciona la caja para ver los documentos</h3>
                <div class="profile-main">
                  <h2 class="text-center">Adecuación de Sucursal: Interior {{ Form::checkbox('interior', 0, null, ['id' => 'interior','class' => 'form-control']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none"  id="autoUpdate" class="col-md-12">
                        @foreach( $adecuacionsucursalinteriors as  $adecuacionsucursalinterior)
          
                       
                          <h1><a href="{{$adecuacionsucursalinterior->urldocu}}" target="_blank">{{$adecuacionsucursalinterior->nombredocu}} </a></h1>
                       
                          <a href="{{$adecuacionsucursalinterior->urldocu}}" class="btn btn-small btn-primary" target="_blank">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>

 <div class="profile-main">
                  <h2 class="text-center">Adecuación de Sucursal: Exterior {{ Form::checkbox('exterior', 0, null, ['id' => 'exterior','class' => 'form-control']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate2" class="col-md-12">
                        @foreach( $adecuacionsucursalexteriors as  $adecuacionsucursalexterior)
          
                       
                          <h1><a href="{{$adecuacionsucursalexterior->urldocu}}" target="_blank">{{$adecuacionsucursalexterior->nombredocu}}</a></h1>
                       
                          <a href="{{$adecuacionsucursalexterior->urldocu}}" class="btn btn-small btn-primary" target="_blank">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>

                <div class="profile-main">
                  <h2 class="text-center">Impresos {{ Form::checkbox('impresos', 0, null, ['id' => 'impresos','class' => 'form-control']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate3"  class="col-md-12">
                        @foreach( $impresos as  $impreso)
          
                       
                          <h1><a href="{{$impreso->urldocu}}" target="_blank">{{$impreso->nombredocu}}</a></h1>
                       
                          <a href="{{$impreso->urldocu}}" class="btn btn-small btn-primary" target="_blank">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>

                <div class="profile-main">
                  <h2 class="text-center">Video para Pantallas {{ Form::checkbox('video', 0, null, ['id' => 'video','class' => 'form-control']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate4" class="col-md-12">
                        @foreach( $videopantallas as  $videopantalla)
          
                       
                          <h1><a href="{{$videopantalla->urldocu}}" target="_blank">{{$videopantalla->nombredocu}}</a></h1>
                       
                          <a href="{{$videopantalla->urldocu}}" class="btn btn-small btn-primary" target="_blank">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                   
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>
              </div>
       
             </div>


 <!-- _________________________________________________________________________________- -->




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@include('layouts.partials.footer')
@include('layouts.partials.file_manager')
@include('layouts.partials.scripts')


<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Asignadas", "Confirmadas", "Pagadas", "Canceladas", "No Show"],
        datasets: [{
            label: '# de Citas',
            data: [{{$citasasigandas}}, {{$citasconfirmadas}}, {{$citaspagadas}}, {{$citascancladas}},{{$citasnoshows}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
              
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
$(document).ready(function(){
    $('#interior').change(function(){
        if(this.checked)
           $('#autoUpdate').show();
       
        else
             $('#autoUpdate').hide();

    });
      $('#exterior').change(function(){
        if(this.checked)
           $('#autoUpdate2').show();
       
        else
             $('#autoUpdate2').hide();

    });
        $('#impresos').change(function(){
        if(this.checked)
           $('#autoUpdate3').show();
       
        else
             $('#autoUpdate3').hide();

    });
          $('#video').change(function(){
        if(this.checked)
           $('#autoUpdate4').show();
       
        else
             $('#autoUpdate4').hide();

    });
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'http://franquiciatario.todoparasuspies.com/user_profile',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});


</script>

<script type="text/javascript">

$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
  
  });
});

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a95f3174b401e45400d427d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript">

Tawk_API = Tawk_API || {};
Tawk_API.visitor = {
 
    name  : '{{$name}}',
    email : '{{$email}}'
    
};
</script>

</body>


</html>