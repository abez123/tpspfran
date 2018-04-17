@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Encuesta Detalle</h2>
      </div>
    </div>
  </div>

<div class="container">
 <h3><a href="{{url('encuestas')}}">Regresar</a></h3>
<div class="box">
 
  <div class="box-body">
    <div class="row">

            
            
           
          
           
           

                      @la_display($module, 'franquiciatario_id')
                    </div>
                </div>
            </div>
            <div class="box">
 
  <div class="box-body">
    <div class="row">
      <div class="form-group"><label for="recibirfactura" class="col-md-12">1. Considerando que se tiene hasta 5 horas hábiles para que se genere su factura una vez que se ha realizado su pedido en el sistema punto de venta, ¿Recibe Usted sus facturas de pedidos en tiempo a traves del Portal?</label><div class="col-md-10 fvalue"><strong>{{$encuestaisf->recibirfactura}}</strong></div></div>
                     
                                </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
        <div class="form-group"><label for="pedidorecibido" class="col-md-12">2. El pedido que recibió es conforme a los facturado? :</label><div class="col-md-10 fvalue"><strong>{{$encuestaisf->pedidorecibido}}</strong></div></div>
                 
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
        <div class="form-group"><label for="notificarpedido" class="col-md-12">3. En su ultimo pedido, se le notificó acerca de algún desabasto de producto, cambio de presentación, precio, gramaje, etc.? :</label><div class="col-md-10 fvalue"><strong>{{$encuestaisf->notificarpedido}}</strong></div></div>
                
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
        <div class="form-group"><label for="paqueteria" class="col-md-12">4.Considerando que se tiene hasta 48 hrs. Hábiles despues de validarse su pago, sus pedidos han sido puestos en la paqueteria en tiempo y forma? :</label><div class="col-md-10 fvalue"><strong>{{$encuestaisf->paqueteria}}</strong></div></div>
                  
                             </div>
                </div>
            </div>
              <div class="box">
 
  <div class="box-body">
    <div class="row">
          <div class="form-group"><label for="almacen" class="col-md-12">5. La atención brindada por el departamento de Almacén, ha sido satisfactoria? :</label><div class="col-md-10 fvalue"><strong>{{$encuestaisf->almacen}}</strong></div></div>
              
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
