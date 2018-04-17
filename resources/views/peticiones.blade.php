@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Petciones</h2>
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
              <!-- <li><a  href="{{url('/user_profile#reportes')}}">Reportes</a></li>-->
             
             <!--  <li><a data-toggle="tab"  href="#citas">Citas</a></li>-->
                  <li><a href="{{url('/noticias')}}">Noticias</a></li>
              
               <li><a  href="{{url('/user_profile#docus')}}">Documentos</a></li>
              <!--<li><a data-toggle="tab" href="#contacto">Contacto</a></li>-->
              <li><a href="#peticiones">Tareas</a></li>         
              <li><a  href="{{url('/user_profile#enlaces')}}">Enlaces</a></li>    
              <li><a  href="{{url('/encuestas')}}">Encuestas</a></li>
             
            </ul>
          </div>
        </div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box"> 
  <div class="box-body">
      <div class="row">

                             <!-- Citas -->
              <div id="citas" class="tab-pane fade">
                <div class="profile-main">
                

         
                  <div class="profile-in">
       @la_access("Peticions", "create")
  <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> Peticion</button>
@endla_access        
                        <br>
                          <br>
                      <div class="box box-success">
  <!--<div class="box-header"></div>-->
  <div class="box-body">
    <table id="example1" class="table table-bordered">
    <thead>
    <tr class="success">
      @foreach( $listing_cols as $col )
      <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
      @endforeach
      @if($show_actions)
      <th>Actions</th>
      @endif
    </tr>
    </thead>
    <tbody>

    </tbody>
    </table>
  </div>
</div>

            
            </div>
          </div>
        </div>




@la_access("Peticions", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Peticion</h4>
      </div>
      {!! Form::open(['action' => 'PeticionsController@store', 'id' => 'peticion-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">
                  
          
        
          @la_input($module, 'titulo')
          @la_input($module, 'mensaje')
          <input type="hidden" value="{{Auth::user()->context_id}}" name="franquiciatario_id">
          @la_input($module, 'empleado_id')
          
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!! Form::submit( 'Crear', ['class'=>'btn btn-success']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endla_access





       

</div>
</div>
</div> 
      </div>
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
<script>
$(function () {
  $("#example1").DataTable({
  
    dom: 'Bfrtip',
    buttons: [
          
            'excelHtml5',{
              extend: 'print',
               message: 'Autopartes Legazpi',
               exportOptions: {
                    columns: ':visible'
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                    }
                },
            {
                extend: 'pdfHtml5',
                
                message: 'Autopartes Legazpi',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open', 
                exportOptions: { columns: ':visible' },
                 
            }
        
           
           
            
        ],
    processing: true,
        serverSide: true,
        ajax: "{{ url('/peticiones_dt_ajax') }}",
    language: {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    @if($show_actions)
    columnDefs: [ { orderable: false, targets: [-1] }],
    @endif
    autoWidth: false,
    scrollY: true,
        scrollX: true,
        scrollCollapse: true,
  });
  $("#cita-add-form").validate({
    
  });
});
</script>
</body>


</html>
