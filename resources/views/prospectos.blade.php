@include('layouts.partials.htmlheader')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Prospectos</h2>
        <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Prospecto</button>
      </div>
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
<div class="box box-success">
  <!--<div class="box-header"></div>-->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-responsive table-striped">
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

                 <div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Prospecto</h4>
      </div>
      {!! Form::open(['action' => 'ProspectosController@store', 'id' => 'prospecto-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">
        
     
           <div class="form-group">
                     <label>Fecha:</label>
             <div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder="Fecha" name="fecha" required> 
              </div>
           </div>
 <div class="form-group">
<label class="control-label"  for="expo">Expo *:</label> <select
							style="width: 100%" name="expo" id="expo"
							class="form-control js-example-basic-select"> @foreach($expos as $item)
							<option value="{{$item->id}}"
								@if(!empty($expos))
                                        @if($item->id==$expo)
								            selected="selected"
								        @endif
								@endif >{{$item->nombreexpo}}</option>
							@endforeach
						</select>
</div>
						
          <div class="form-group">
                    <label>Nombre Compeleto:</label>
         <input type='text' class="form-control" placeholder="Nombre Completo" name="nombrecompletoprosp" required> 
           </div>

        <div class="form-group">
                    <label>Teléfono:</label>
         <input type='tel' class="form-control" placeholder="Teléfono" name="telefono" required> 
           </div>

                <div class="form-group">
                    <label>Celular:</label>
         <input type='tel' class="form-control" placeholder="Celular" name="celular" required> 
           </div>
        <div class="form-group">
                    <label>Email:</label>
         <input type='email' class="form-control" placeholder="Email" name="email" required> 
           </div>
       <div class="form-group">
                    <label>Estado Civil:</label>
       <select style="width: 1000%" class="form-control select2" name="estadocivil" required>
        <option value="Soletero">Soletero</option>
        <option value="Casado">Casado</option>
        <option value="Divorciado">Divorciado</option>
        <option value="Viudo">Viudo</option>
        <option value="Uniion Libre">Uniion Libre</option>
      </select>
           </div>
     <div class="form-group">
                    <label>¿Cuenta con experiencia en Salud y Belleza?</label>
                    <br>
          <input type="radio" name="experiencia" value="Si"> Si<br>
               <input type="radio" name="experiencia" value="No"> No<br>
           </div>
<br>
                <div class="form-group">
                    <label>Si tiene experiencia ¿Cual?</label>

           <textarea name="cualexperiancia" placeholder="Si tiene experiencia ¿Cual?" rows="4" cols="50"></textarea>
         </div>

          <div class="form-group">
                    <label>  ¿A qué se dedica actualmente?</label>

           <textarea name="sutrabajoactual" placeholder="¿A qué se dedica actualmente?" rows="4" cols="50"></textarea>
         </div>
      
<div class="form-group">
                    <label>¿Posee algún negocio? </label>
                    <br>
          <input type="radio" name="negociopropio" value="Si"> Si<br>
               <input type="radio" name="negociopropio" value="No"> No<br>
           </div>
<br>
           <div class="form-group">
                    <label> ¿Cuenta con experiencia en el sector franquicia?</label>
                    <br>
          <input type="radio" name="experianciafran" value="Si"> Si<br>
               <input type="radio" name="experianciafran" value="No"> No<br>
           </div>
          
   
         <div class="form-group">
                    <label> Especificar si tiene experiencia en Franquicias</label>

           <textarea name="cualexperianciafran" placeholder="Especificar si tiene experiencia en Franquicias" rows="4" cols="50"></textarea>
         </div>
    
     <div class="form-group">
                    <label> ¿En qué ciudad le interesa abrir una franquicia?</label>
      <input type='text' class="form-control" placeholder="¿En qué ciudad le interesa abrir una franquicia?" name="queciudad"> 
         </div>
          
    <div class="form-group">
                    <label> ¿Cuenta con local comercial?</label>
                    <br>
          <input type="radio" name="localpropio" value="Si"> Si<br>
               <input type="radio" name="localpropio" value="No"> No<br>
           </div>

       <div class="form-group">
                    <label> En caso de tener local propio anote ubicación y metros</label>

           <textarea name="uicacionmetros" placeholder=" En caso de tener local propio anote ubicación y metros" rows="4" cols="50"></textarea>
         </div>

 <div class="form-group">
                     <label>Fecha en que desearía iniciar operación de su franquicia.</label>
             <div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder="Fecha" name="fechadeseo" required> 
              </div>
           </div>
          
    <div class="form-group">
                    <label>¿Su inversión está solventada por? </label>
       <select style="width: 1000%" class="form-control select2" name="solventadapor" required>
        <option value="Usted Solo">Usted Solo</option>
        <option value="Sociedad">Sociedad</option>
        <option value="Familiar">Familiar</option>
        <option value="Financiamiento">Financiamiento</option>
        <option value="Otro">Otro</option>
      </select>
           </div>

   <div class="form-group">
                    <label>  Si la opción es Otro o Financiamiento favor de Especificar</label>

           <textarea name="especificarotro" placeholder="Si la opción es Otro o Financiamiento favor de Especificar" rows="4" cols="50"></textarea>
         </div>



         <div class="form-group">
                    <label> A cargo de quién estaría la operación de su franquicia?</label>
      <input type='text' class="form-control" placeholder="A cargo de quién estaría la operación de su franquicia?" name="cargoquien"> 
         </div>


   <div class="form-group">
                    <label>  A cuánto asciende el monto de lo que Usted desea invertir? </label>
       <select style="width: 1000%" class="form-control select2" name="inversion" required>
        <option value="Menos de $500,000.00">Menos de $500,000.00</option>
        <option value="De $5000,000.00 a $1,000,000.00">De $5000,000.00 a $1,000,000.00</option>
        <option value="Arriba de $1,000,000.00">Arriba de $1,000,000.00</option>
     
      </select>
     </div>

 <div class="form-group">
                    <label>Comentarios</label>

           <textarea name="comentarios" placeholder=" Comentarios" rows="4" cols="50"></textarea>
         </div>


          <div class="form-group">
                    <label> Antendido por: </label>
       <select style="width: 100%" class="form-control select2" name="atendidopor" required>
        <option value="Osiris Ruvalcaba">Osiris Ruvalcaba</option>
        <option value="Clarisa Macias">Clarisa Macias</option>
        <option value="Dr Ignacio Garcia de la Paz">Dr Ignacio Garcia de la Paz</option>
     <option value="Lic.. Ignacio Garcia de la Paz">Lic.. Ignacio Garcia de la Paz</option>
     <option value="Omar Garcia de la Paz">Omar Garcia de la Paz</option>
      </select>
           </div>
          
  <div class="form-group">
                     <label> Fecha de próximo contacto</label>
             <div class='input-group datetime' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder=" Fecha de próximo contacto" name="fechaprimercontacto" required> 
              </div>
           </div>

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
                     
           </div>    


<!-- end #main-wrapper -->

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

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
                
                message: 'Todo para Sus Pies',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open', 
                exportOptions: { columns: ':visible' },
                 
            }
        
           
           
            
        ],
    processing: true,
        serverSide: true,
        ajax: "{{ url('/prospectos_dt_ajax') }}",
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
  $("#prospecto-add-form").validate({
    
  });
});
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

