@extends("la.layouts.app")

@section("contentheader_title", "Checklists")
@section("contentheader_description", "Checklists lista")
@section("section", "Checklists")
@section("sub_section", "Lista")
@section("htmlheader_title", "Checklists Lista")

@section("headerElems")
@la_access("Checklists", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> Checklist</button>
@endla_access
@endsection

@section("main-content")

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

@la_access("Checklists", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> CHECK LIST DE VISITA DE SUPERVISIÓN A FRANQUICIA</h4>
			</div>
			{!! Form::open(['action' => 'LA\ChecklistsController@store', 'id' => 'checklist-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                  
					@la_input($module, 'sucursal_id')
					@la_input($module, 'fecha')
					<h2>FACHADA</h2>
					<h4>1. @la_input($module, 'fachada1')</h4>
					
					<div class="form-group"><label for="ponderaconfachada1">Ponderación:</label><input class="form-control valid" id="ponderaconfachada1" name="ponderaconfachada1" type="number" value="5.0" readonly></div>
					@la_input($module, 'comentarios')
					@la_input($module, 'imagenfachada1')
					
					<h4>2. @la_input($module, 'fachada2')</h4>
					@la_input($module, 'ponderacionfachada2')
					@la_input($module, 'comentarios2')
					@la_input($module, 'imagen2')
					<h4>3. @la_input($module, 'fachada3')</h4>
					@la_input($module, 'ponderacionfachada3')
					@la_input($module, 'comentarios3')
					@la_input($module, 'imagen3')
					<h4>4. @la_input($module, 'fachada4')</h4>
					@la_input($module, 'ponderacion4')
					@la_input($module, 'comentarios4')
					@la_input($module, 'imagen4')
					<h4>5. @la_input($module, 'fachada5')</h4>
					@la_input($module, 'ponderacion5')
					@la_input($module, 'comentarios5')
					@la_input($module, 'imagen5')
					<h4>6. @la_input($module, 'fachada6')</h4>
					@la_input($module, 'ponderacionfachada6')
					@la_input($module, 'comentarios6')
					@la_input($module, 'imagen6')
					<h2>IMAGEN</h2>
					<h4>7. @la_input($module, 'imagenpregunta1')</h4>
					@la_input($module, 'ponderacion7')
					@la_input($module, 'comentarios7')
					@la_input($module, 'imagen7')
					<h4>8. @la_input($module, 'imagenpregunta2')</h4>
					@la_input($module, 'ponderacion8')
					@la_input($module, 'comentarios8')
					@la_input($module, 'imagen8')
					<h4>9. @la_input($module, 'imagenpregunta3')</h4>
					@la_input($module, 'ponderacion9')
					@la_input($module, 'comentarios9')
					@la_input($module, 'imagen9')
					<h4>10. @la_input($module, 'imagenpregunta4')</h4>
					@la_input($module, 'ponderacion10')
					@la_input($module, 'comentarios10')
					@la_input($module, 'imagen10')
					<h4>11. @la_input($module, 'imagenpregunta5')</h4>
					@la_input($module, 'ponderacion11')
					@la_input($module, 'comentarios11')
					@la_input($module, 'imagen11')
					<h4>12. @la_input($module, 'imagenpregunta6')</h4>
					@la_input($module, 'ponderacion12')
					@la_input($module, 'comentarios12')
					@la_input($module, 'imagen12')
					<h4>13. @la_input($module, 'imagenpregunta7')</h4>
					@la_input($module, 'ponderacion13')
					@la_input($module, 'comentarios13')
					@la_input($module, 'imagen13')
					<h4>14. @la_input($module, 'imagenpregunta8')</h4>
					@la_input($module, 'ponderacion14')
					@la_input($module, 'comentarios14')
					@la_input($module, 'imagen14')
					<h4>15. @la_input($module, 'imagenpregunta9')</h4>
					@la_input($module, 'ponderacion15')
					@la_input($module, 'comentarios15')
					@la_input($module, 'imagen15')
					<h2>RECEPCIÓN</h2>
					<h4>16. @la_input($module, 'recepcion1')</h4>
					@la_input($module, 'ponderacion16')
					@la_input($module, 'comentarios16')
					@la_input($module, 'imagen16')
					<h4>17. @la_input($module, 'recepcion2')</h4>
					@la_input($module, 'ponderacion17')
					@la_input($module, 'comentarios17')
					@la_input($module, 'imagen17')
					<h4>18. @la_input($module, 'recepcion3')</h4>
					@la_input($module, 'ponderacion18')
					@la_input($module, 'comentarios18')
					@la_input($module, 'imagen18')
					<h4>19. @la_input($module, 'recepcion4')</h4>
					@la_input($module, 'ponderacion19')
					@la_input($module, 'comentarios19')
					@la_input($module, 'imagen19')
					<h4>20. @la_input($module, 'recepcion5')</h4>
					@la_input($module, 'ponderacion20')
					@la_input($module, 'comentarios20')
					@la_input($module, 'imagen20')
					<h4>21. @la_input($module, 'recepcion6')</h4>
					@la_input($module, 'ponderacion21')
					@la_input($module, 'comentarios21')
					@la_input($module, 'imagen21')
					<h4>22. @la_input($module, 'recepcion7')</h4>
					@la_input($module, 'ponderacion22')
					@la_input($module, 'comentarios22')
					@la_input($module, 'imagen22')
					<h4>23. @la_input($module, 'recepcion8')</h4>
					@la_input($module, 'ponderacion23')
					@la_input($module, 'comentarios23')
					@la_input($module, 'imagen23')
					<h2>CUBÍCULO</h2>
					<h4>24. @la_input($module, 'cubiculo1')</h4>
					@la_input($module, 'ponderacion24')
					@la_input($module, 'comentarios24')
					@la_input($module, 'imagen24')
					<h4>25. @la_input($module, 'cubiculo2')</h4>
					@la_input($module, 'ponderacion25')
					@la_input($module, 'comentarios25')
					@la_input($module, 'imagen25')
					<h4>26. @la_input($module, 'cubiculo3')</h4>
					@la_input($module, 'ponderacion26')
					@la_input($module, 'comentarios26')
					@la_input($module, 'imagen26')
					<h4>27. @la_input($module, 'cubiculo4')</h4>
					@la_input($module, 'ponderacion27')
					@la_input($module, 'comentarios27')
					@la_input($module, 'imagen27')
					<h4>28. @la_input($module, 'cubiculo5')</h4>
					@la_input($module, 'ponderacion28')
					@la_input($module, 'comentarios28')
					@la_input($module, 'imagen28')
					<h4>29. @la_input($module, 'cubiculo6')</h4>
					@la_input($module, 'ponderacion29')
					@la_input($module, 'comentarios29')
					@la_input($module, 'imagen29')
					<h4>30. @la_input($module, 'cubiculo7')</h4>
					@la_input($module, 'ponderacion30')
					@la_input($module, 'comentarios30')
					@la_input($module, 'imagen30')
					<h4>31. @la_input($module, 'cubiculo8')</h4>
					@la_input($module, 'ponderacion31')
					@la_input($module, 'comentarios31')
					@la_input($module, 'imagen31')
					<h2>PROCESO</h2>
					<h4>32. @la_input($module, 'proceso1')</h4>
					@la_input($module, 'ponderacion32')
					@la_input($module, 'comentarios32')
					<h4>33. @la_input($module, 'proceso2')</h4>
					@la_input($module, 'ponderacion33')
					@la_input($module, 'comentarios33')
					<h4>34. @la_input($module, 'proceso3')</h4>
					@la_input($module, 'ponderacion34')
					@la_input($module, 'comentarios34')
					<h4>35. @la_input($module, 'proceso4')</h4>
					@la_input($module, 'ponderacion35')
					@la_input($module, 'comentarios35')
					<h4>36. @la_input($module, 'proceso5')</h4>
					@la_input($module, 'ponderacion36')
					@la_input($module, 'comentarios36')
					@la_input($module, 'imagen36')
					<h4>37. @la_input($module, 'proceso6')</h4>
					@la_input($module, 'ponderacion37')
					@la_input($module, 'comentarios37')
					<h4>38. @la_input($module, 'proceso7')</h4>
					@la_input($module, 'ponderacion38')
					@la_input($module, 'comentarios38')
					@la_input($module, 'archivo1')
					<h4>39. @la_input($module, 'proceso8')</h4>
					@la_input($module, 'ponderacion39')
					@la_input($module, 'comentarios39')
					@la_input($module, 'archivo2')
					<h4>40. @la_input($module, 'proceso9')</h4>
					@la_input($module, 'ponderacion40')
					@la_input($module, 'comentarios40')
					@la_input($module, 'archivo3')
					<h4>41. @la_input($module, 'proceso10')</h4>
					@la_input($module, 'ponderacion41')
					@la_input($module, 'comentarios41')
					@la_input($module, 'archivo4')
					<h4>42. @la_input($module, 'proceso11')</h4>
					@la_input($module, 'ponderacion42')
					@la_input($module, 'comentarios42')
					<h4>43. @la_input($module, 'proceso12')</h4>
					@la_input($module, 'ponderacion43')
					@la_input($module, 'comentarios43')
					<h4>44. @la_input($module, 'proceso13')</h4>
					@la_input($module, 'ponderacion44')
					@la_input($module, 'comentarios44')
					<h2>INVENTARIO</h2>
					<h4>45. @la_input($module, 'inventario1')</h4>
					@la_input($module, 'ponderacion45')
					@la_input($module, 'comentarios45')
					@la_input($module, 'imagen45')
					<h4>46. @la_input($module, 'inventario2')</h4>
					@la_input($module, 'ponderacion46')
					@la_input($module, 'comentarios46')
					@la_input($module, 'imagen46')
					<h2>SISTEMA</h2>
					<h4>47. @la_input($module, 'sistema4')</h4>
					@la_input($module, 'ponderacion47')
					@la_input($module, 'comentarios47')
					@la_input($module, 'imagen47')
					<h4>48. @la_input($module, 'sistema3')</h4>
					@la_input($module, 'ponderacion48')
					@la_input($module, 'comentarios48')
					@la_input($module, 'imagen48')
					<h4>49. @la_input($module, 'sistema2')</h4>
					@la_input($module, 'ponderacion49')
					@la_input($module, 'comentarios49')
					@la_input($module, 'imagen49')
					<h4>50. @la_input($module, 'sistema1')</h4>
					@la_input($module, 'ponderacion50')
					@la_input($module, 'comentarios50')
					@la_input($module, 'imagen50')
				
					<h2>Vidéo</h2>
					@la_input($module, 'video')
				
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

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/checklist_dt_ajax') }}",
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
	$("#checklist-add-form").validate({
		

	});
});
</script>

@endpush
