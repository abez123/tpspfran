@extends('la.layouts.app')
<style type="text/css" media="screen">
#mybutton{
	position: fixed;
	padding: 5px 30px;
	right: 0px;
	bottom: 0;

}	

</style>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
@section('htmlheader_title')
	Checklist View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div  id="myHeader" class="bg-primary clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
					<div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
				</div>
				<div class="col-md-9">
					<h4 class="name">Checklist Franquicias</h4>
					<div class="row stats">
						<div class="col-md-4"><i class="fa fa-facebook"></i> 234</div>
						<div class="col-md-4"><i class="fa fa-twitter"></i> 12</div>
						<div class="col-md-4"><i class="fa fa-instagram"></i> 89</div>
					</div>
			
				</div>
			</div>
		</div>
	
		<div class="col-md-4">

		
	
		
			<div class="dats1 pb">
				<div class="clearfix">
				
				</div>
		
			</div>
		</div>
		<div class="col-md-1 actions">
			@la_access("Checklists", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/checklists/'.$checklist->id.'/pdf') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-file-pdf-o"></i></a><br>
			@endla_access
			@la_access("Checklists", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/checklists/'.$checklist->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Checklists", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.checklists.destroy', $checklist->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access

		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/checklists') }}" data-toggle="tooltip" data-placement="right" title="Back to Checklists"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
		
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>Información General</h4>
						@la_access("Compromisos", "create")
	<button id="mybutton" class="btn btn-success btn-sm " data-toggle="modal" data-target="#AddModal" ><i class="fa fa-plus"></i> Compromiso</button>
@endla_access
					</div>
					<div class="panel-body">
			
						@la_display($module, 'sucursal_id')
						@la_display($module, 'fecha')
						<h2 style="color: #48B0F7;">FACHADA</h2>

					
						<div class="form-group">
							<label for="fachada1" class="col-md-6"><h4><strong>1. Cuenta con anuncio en letras separadas de aluminio :</strong></h4></label>
							<div class="col-md-6"><h5>{{$checklist->fachada1}}</h5></div>
						</div>
											
						@la_display($module, 'ponderaconfachada1')
						@la_display($module, 'comentarios')
						@la_display($module, 'imagenfachada1')

						<h4>2.@la_display($module, 'fachada2')</h4>
						@la_display($module, 'ponderacionfachada2')
						@la_display($module, 'comentarios2')
						@la_display($module, 'imagen2')

						<h4>3.@la_display($module, 'fachada3')</h4>
						@la_display($module, 'ponderacionfachada3')
						@la_display($module, 'comentarios3')
						@la_display($module, 'imagen3')

						<h4>4.@la_display($module, 'fachada4')</h4>
						@la_display($module, 'ponderacion4')
						@la_display($module, 'comentarios4')
						@la_display($module, 'imagen4')

						<h4>5.@la_display($module, 'fachada5')</h4>
						@la_display($module, 'ponderacion5')
						@la_display($module, 'comentarios5')
						@la_display($module, 'imagen5')

						<h4>6.@la_display($module, 'fachada6')</h4>
						@la_display($module, 'ponderacionfachada6')
						@la_display($module, 'comentarios6')
						@la_display($module, 'imagen6')
						<h2 style="color: #48B0F7;">IMAGEN</h2>
						<h4>7.@la_display($module, 'imagenpregunta1')</h4>
						@la_display($module, 'ponderacion7')
						@la_display($module, 'comentarios7')
						@la_display($module, 'imagen7')
						<h4>8.
						@la_display($module, 'imagenpregunta2')</h4>
						@la_display($module, 'ponderacion8')
						@la_display($module, 'comentarios8')
						@la_display($module, 'imagen8')
						<h4>9.
						@la_display($module, 'imagenpregunta3')</h4>
						@la_display($module, 'ponderacion9')
						@la_display($module, 'comentarios9')
						@la_display($module, 'imagen9')
						<h4>10.
						@la_display($module, 'imagenpregunta4')</h4>
						@la_display($module, 'ponderacion10')
						@la_display($module, 'comentarios10')
						@la_display($module, 'imagen10')
						<h4>11.
						@la_display($module, 'imagenpregunta5')</h4>
						@la_display($module, 'ponderacion11')
						@la_display($module, 'comentarios11')
						@la_display($module, 'imagen11')
						<h4>12.
						@la_display($module, 'imagenpregunta6')</h4>
						@la_display($module, 'ponderacion12')
						@la_display($module, 'comentarios12')
						@la_display($module, 'imagen12')
						<h4>13.
						@la_display($module, 'imagenpregunta7')</h4>
						@la_display($module, 'ponderacion13')
						@la_display($module, 'comentarios13')
						@la_display($module, 'imagen13')
						<h4>14.
						@la_display($module, 'imagenpregunta8')</h4>
						@la_display($module, 'ponderacion14')
						@la_display($module, 'comentarios14')
						@la_display($module, 'imagen14')
						<h4>15.
						@la_display($module, 'imagenpregunta9')</h4>
						@la_display($module, 'ponderacion15')
						@la_display($module, 'comentarios15')
						@la_display($module, 'imagen15')
						<h2 style="color: #48B0F7;">RECEPCIÓN</h2>
						<h4>16.
						@la_display($module, 'recepcion1')</h4>
						@la_display($module, 'ponderacion16')
						@la_display($module, 'comentarios16')
						@la_display($module, 'imagen16')
						<h4>17.
						@la_display($module, 'recepcion2')</h4>
						@la_display($module, 'ponderacion17')
						@la_display($module, 'comentarios17')
						@la_display($module, 'imagen17')
						<h4>18.
						@la_display($module, 'recepcion3')</h4>
						@la_display($module, 'ponderacion18')
						@la_display($module, 'comentarios18')
						@la_display($module, 'imagen18')
						<h4>19.
						@la_display($module, 'recepcion4')</h4>
						@la_display($module, 'ponderacion19')
						@la_display($module, 'comentarios19')
						@la_display($module, 'imagen19')
						<h4>20.
						@la_display($module, 'recepcion5')</h4>
						@la_display($module, 'ponderacion20')
						@la_display($module, 'comentarios20')
						@la_display($module, 'imagen20')
						<h4>21.
						@la_display($module, 'recepcion6')</h4>
						@la_display($module, 'ponderacion21')
						@la_display($module, 'comentarios21')
						@la_display($module, 'imagen21')
						<h4>22.
						@la_display($module, 'recepcion7')</h4>
						@la_display($module, 'ponderacion22')
						@la_display($module, 'comentarios22')
						@la_display($module, 'imagen22')
						<h4>23.
						@la_display($module, 'recepcion8')</h4>
						@la_display($module, 'ponderacion23')
						@la_display($module, 'comentarios23')
						@la_display($module, 'imagen23')
						<h2 style="color: #48B0F7;">CUBÍCULO</h2>
						<h4>24.
						@la_display($module, 'cubiculo1')</h4>
						@la_display($module, 'ponderacion24')
						@la_display($module, 'comentarios24')
						@la_display($module, 'imagen24')
						<h4>25.
						@la_display($module, 'cubiculo2')</h4>
						@la_display($module, 'ponderacion25')
						@la_display($module, 'comentarios25')
						@la_display($module, 'imagen25')
						<h4>26.
						@la_display($module, 'cubiculo3')</h4>
						@la_display($module, 'ponderacion26')
						@la_display($module, 'comentarios26')
						@la_display($module, 'imagen26')
						<h4>27.
						@la_display($module, 'cubiculo4')</h4>
						@la_display($module, 'ponderacion27')
						@la_display($module, 'comentarios27')
						@la_display($module, 'imagen27')
						<h4>28.
						@la_display($module, 'cubiculo5')</h4>
						@la_display($module, 'ponderacion28')
						@la_display($module, 'comentarios28')
						@la_display($module, 'imagen28')
						<h4>29.
						@la_display($module, 'cubiculo6')</h4>
						@la_display($module, 'ponderacion29')
						@la_display($module, 'comentarios29')
						@la_display($module, 'imagen29')
						<h4>30.
						@la_display($module, 'cubiculo7')</h4>
						@la_display($module, 'ponderacion30')
						@la_display($module, 'comentarios30')
						@la_display($module, 'imagen30')
						<h4>31.
						@la_display($module, 'cubiculo8')</h4>
						@la_display($module, 'ponderacion31')
						@la_display($module, 'comentarios31')
						@la_display($module, 'imagen31')
						<h2 style="color: #48B0F7;">PROCESO</h2>
						<h4>32.
						@la_display($module, 'proceso1')</h4>
						@la_display($module, 'ponderacion32')
						@la_display($module, 'comentarios32')
						@la_display($module, 'proceso2')
						<h4>33.
						@la_display($module, 'proceso2')</h4>
						@la_display($module, 'ponderacion33')</h4>
						@la_display($module, 'comentarios33')
						<h4>34.
						@la_display($module, 'proceso3')</h4>
						@la_display($module, 'ponderacion34')
						@la_display($module, 'comentarios34')
						<h4>35.
						@la_display($module, 'proceso4')</h4>
						@la_display($module, 'ponderacion35')
						@la_display($module, 'comentarios35')
						<h4>36.
						@la_display($module, 'proceso5')</h4>
						@la_display($module, 'ponderacion36')
						@la_display($module, 'comentarios36')
						@la_display($module, 'imagen36')
						<h4>37.
						@la_display($module, 'proceso6')</h4>
						@la_display($module, 'ponderacion37')
						@la_display($module, 'comentarios37')
						<h4>38.
						@la_display($module, 'proceso7')</h4>
						@la_display($module, 'ponderacion38')
						@la_display($module, 'comentarios38')						
						@la_display($module, 'archivo1')
						<h4>39.
						@la_display($module, 'proceso8')</h4>
						@la_display($module, 'ponderacion39')
						@la_display($module, 'comentarios39')						
						@la_display($module, 'archivo2')
					    <h4>40.
						@la_display($module, 'proceso9')</h4>
						@la_display($module, 'ponderacion40')
						@la_display($module, 'comentarios40')
						@la_display($module, 'archivo3')
						<h4>41.
						@la_display($module, 'proceso10')</h4>
						@la_display($module, 'ponderacion41')
						@la_display($module, 'comentarios41')
						@la_display($module, 'archivo4')
						<h4>42.
						@la_display($module, 'proceso11')</h4>
						@la_display($module, 'ponderacion42')
						@la_display($module, 'comentarios42')
						<h4>43.
						@la_display($module, 'proceso12')</h4>
						@la_display($module, 'ponderacion43')
						@la_display($module, 'comentarios43')
						<h4>44.
						@la_display($module, 'proceso13')</h4>
						@la_display($module, 'ponderacion44')
						@la_display($module, 'comentarios44')
						<h2 style="color: #48B0F7;">INVENTARIO</h2>
						<h4>45.
						@la_display($module, 'inventario1')</h4>
						@la_display($module, 'ponderacion45')
						@la_display($module, 'comentarios45')
						@la_display($module, 'imagen45')
						<h4>46.
						@la_display($module, 'inventario2')</h4>
						@la_display($module, 'ponderacion46')
						@la_display($module, 'comentarios46')
						@la_display($module, 'imagen46')
						<h2 style="color: #48B0F7;">SISTEMA</h2>
						<h4>47.
						@la_display($module, 'sistema4')</h4>
						@la_display($module, 'ponderacion47')
						@la_display($module, 'comentarios47')
						@la_display($module, 'imagen47')
						<h4>48.
						@la_display($module, 'sistema3')</h4>
						@la_display($module, 'ponderacion48')
						@la_display($module, 'comentarios48')
						@la_display($module, 'imagen48')
						<h4>49.
						@la_display($module, 'sistema2')</h4>
						@la_display($module, 'ponderacion49')
						@la_display($module, 'comentarios49')
						@la_display($module, 'imagen49')
						<h4>50.
						@la_display($module, 'sistema1')</h4>
						@la_display($module, 'ponderacion50')
						@la_display($module, 'comentarios50')
						@la_display($module, 'imagen50')
						<h2 style="color: #48B0F7;">Calificación Final</h2>
						@la_display($module, 'calfinal')
						<h2 style="color: #48B0F7;">Vidéo</h2>
						@la_display($module, 'video')
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
			@foreach( $listing_cols2 as $col )
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
					@la_access("Compromisos", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Compromiso</h4>
			</div>
			{!! Form::open(['action' => 'LA\CompromisosController@store', 'id' => 'compromiso-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                  
					
					<input type="hidden" name="checklist_id" value="{{$checklist->id}}">
			
					@la_input($module2, 'comentariocompromiso')
					@la_input($module2, 'fechacompromiso')
					@la_input($module2, 'fechaentrega')
					@la_input($module2, 'estatuscompromiso')
					@la_input($module2, 'evidencia')
					
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
		<div id="signature-pad" class="signature-pad">
    <div class="signature-pad--body">
      <canvas width="664" height="294" style="touch-action: none;"></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Firma arriba</div>

      <div class="signature-pad--actions">
        <div>
          <button type="button" class="button clear" data-action="clear">Borrar</button>
          <button type="button" class="button" data-action="change-color">Cambiar color</button>
          <button type="button" class="button" data-action="undo">Deshacer</button>

        </div>
        <div>
          <button type="button" class="button save" data-action="save-png">Guarda como PNG</button>
          <button type="button" class="button save" data-action="save-jpg">Guarda como JPG</button>
          <button type="button" class="button save" data-action="save-svg">Guarda como SVG</button>
        </div>
      </div>
    </div>
  </div>
	
	</div>
</div>

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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/compromiso_dt_ajax_detalle/'.$checklist->id) }}",
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
	$("#compromiso-add-form").validate({
		
	});
});
</script>
<script>
	// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var button = document.getElementById("mybutton");

// Get the offset position of the navbar
var sticky = button.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    button.classList.add("sticky");
  } else {
    button.classList.remove("sticky");
  }
}
</script>
<script type="text/javascript">
	
var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var changeColorButton = wrapper.querySelector("[data-action=change-color]");
var undoButton = wrapper.querySelector("[data-action=undo]");
var savePNGButton = wrapper.querySelector("[data-action=save-png]");
var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  // This library does not listen for canvas changes, so after the canvas is automatically
  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
  // that the state of this library is consistent with visual state of the canvas, you
  // have to clear it manually.
  signaturePad.clear();
}

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
window.onresize = resizeCanvas;
resizeCanvas();

function download(dataURL, filename) {
  var blob = dataURLToBlob(dataURL);
  var url = window.URL.createObjectURL(blob);

  var a = document.createElement("a");
  a.style = "display: none";
  a.href = url;
  a.download = filename;

  document.body.appendChild(a);
  a.click();

  window.URL.revokeObjectURL(url);
}

// One could simply use Canvas#toBlob method instead, but it's just to show
// that it can be done using result of SignaturePad#toDataURL.
function dataURLToBlob(dataURL) {
  // Code taken from https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}

clearButton.addEventListener("click", function (event) {
  signaturePad.clear();
});

undoButton.addEventListener("click", function (event) {
  var data = signaturePad.toData();

  if (data) {
    data.pop(); // remove the last dot or line
    signaturePad.fromData(data);
  }
});

changeColorButton.addEventListener("click", function (event) {
  var r = Math.round(Math.random() * 255);
  var g = Math.round(Math.random() * 255);
  var b = Math.round(Math.random() * 255);
  var color = "rgb(" + r + "," + g + "," + b +")";

  signaturePad.penColor = color;
});

savePNGButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    alert("Please provide a signature first.");
  } else {
    var dataURL = signaturePad.toDataURL();
    download(dataURL, "signature.png");
  }
});

saveJPGButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    alert("Please provide a signature first.");
  } else {
    var dataURL = signaturePad.toDataURL("image/jpeg");
    download(dataURL, "signature.jpg");
  }
});

saveSVGButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    alert("Please provide a signature first.");
  } else {
    var dataURL = signaturePad.toDataURL('image/svg+xml');
    download(dataURL, "signature.svg");
  }
});
/*!
 * Signature Pad v3.0.0-beta.1 | https://github.com/szimek/signature_pad
 * (c) 2018 Szymon Nowak | Released under the MIT license
 */

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global.SignaturePad = factory());
}(this, (function () { 'use strict';

  var Point = (function () {
      function Point(x, y, time) {
          this.x = x;
          this.y = y;
          this.time = time || Date.now();
      }
      Point.prototype.distanceTo = function (start) {
          return Math.sqrt(Math.pow(this.x - start.x, 2) + Math.pow(this.y - start.y, 2));
      };
      Point.prototype.equals = function (other) {
          return this.x === other.x && this.y === other.y && this.time === other.time;
      };
      Point.prototype.velocityFrom = function (start) {
          return (this.time !== start.time) ? this.distanceTo(start) / (this.time - start.time) : 0;
      };
      return Point;
  }());

  var Bezier = (function () {
      function Bezier(startPoint, control2, control1, endPoint, startWidth, endWidth) {
          this.startPoint = startPoint;
          this.control2 = control2;
          this.control1 = control1;
          this.endPoint = endPoint;
          this.startWidth = startWidth;
          this.endWidth = endWidth;
      }
      Bezier.fromPoints = function (points, widths) {
          var c2 = this.calculateControlPoints(points[0], points[1], points[2]).c2;
          var c3 = this.calculateControlPoints(points[1], points[2], points[3]).c1;
          return new Bezier(points[1], c2, c3, points[2], widths.start, widths.end);
      };
      Bezier.calculateControlPoints = function (s1, s2, s3) {
          var dx1 = s1.x - s2.x;
          var dy1 = s1.y - s2.y;
          var dx2 = s2.x - s3.x;
          var dy2 = s2.y - s3.y;
          var m1 = { x: (s1.x + s2.x) / 2.0, y: (s1.y + s2.y) / 2.0 };
          var m2 = { x: (s2.x + s3.x) / 2.0, y: (s2.y + s3.y) / 2.0 };
          var l1 = Math.sqrt((dx1 * dx1) + (dy1 * dy1));
          var l2 = Math.sqrt((dx2 * dx2) + (dy2 * dy2));
          var dxm = (m1.x - m2.x);
          var dym = (m1.y - m2.y);
          var k = l2 / (l1 + l2);
          var cm = { x: m2.x + (dxm * k), y: m2.y + (dym * k) };
          var tx = s2.x - cm.x;
          var ty = s2.y - cm.y;
          return {
              c1: new Point(m1.x + tx, m1.y + ty),
              c2: new Point(m2.x + tx, m2.y + ty)
          };
      };
      Bezier.prototype.length = function () {
          var steps = 10;
          var length = 0;
          var px;
          var py;
          for (var i = 0; i <= steps; i += 1) {
              var t = i / steps;
              var cx = this.point(t, this.startPoint.x, this.control1.x, this.control2.x, this.endPoint.x);
              var cy = this.point(t, this.startPoint.y, this.control1.y, this.control2.y, this.endPoint.y);
              if (i > 0) {
                  var xdiff = cx - px;
                  var ydiff = cy - py;
                  length += Math.sqrt((xdiff * xdiff) + (ydiff * ydiff));
              }
              px = cx;
              py = cy;
          }
          return length;
      };
      Bezier.prototype.point = function (t, start, c1, c2, end) {
          return (start * (1.0 - t) * (1.0 - t) * (1.0 - t))
              + (3.0 * c1 * (1.0 - t) * (1.0 - t) * t)
              + (3.0 * c2 * (1.0 - t) * t * t)
              + (end * t * t * t);
      };
      return Bezier;
  }());

  function throttle(fn, wait) {
      if (wait === void 0) { wait = 250; }
      var previous = 0;
      var timeout = null;
      var result;
      var storedContext;
      var storedArgs;
      var later = function () {
          previous = Date.now();
          timeout = null;
          result = fn.apply(storedContext, storedArgs);
          if (!timeout) {
              storedContext = null;
              storedArgs = [];
          }
      };
      return function () {
          var args = [];
          for (var _i = 0; _i < arguments.length; _i++) {
              args[_i] = arguments[_i];
          }
          var now = Date.now();
          var remaining = wait - (now - previous);
          storedContext = this;
          storedArgs = args;
          if (remaining <= 0 || remaining > wait) {
              if (timeout) {
                  clearTimeout(timeout);
                  timeout = null;
              }
              previous = now;
              result = fn.apply(storedContext, storedArgs);
              if (!timeout) {
                  storedContext = null;
                  storedArgs = [];
              }
          }
          else if (!timeout) {
              timeout = setTimeout(later, remaining);
          }
          return result;
      };
  }

  var SignaturePad = (function () {
      function SignaturePad(canvas, options) {
          if (options === void 0) { options = {}; }
          var _this = this;
          this.canvas = canvas;
          this.options = options;
          this._handleMouseDown = function (event) {
              if (event.which === 1) {
                  _this._mouseButtonDown = true;
                  _this._strokeBegin(event);
              }
          };
          this._handleMouseMove = function (event) {
              if (_this._mouseButtonDown) {
                  _this._strokeMoveUpdate(event);
              }
          };
          this._handleMouseUp = function (event) {
              if (event.which === 1 && _this._mouseButtonDown) {
                  _this._mouseButtonDown = false;
                  _this._strokeEnd(event);
              }
          };
          this._handleTouchStart = function (event) {
              event.preventDefault();
              if (event.targetTouches.length === 1) {
                  var touch = event.changedTouches[0];
                  _this._strokeBegin(touch);
              }
          };
          this._handleTouchMove = function (event) {
              event.preventDefault();
              var touch = event.targetTouches[0];
              _this._strokeMoveUpdate(touch);
          };
          this._handleTouchEnd = function (event) {
              var wasCanvasTouched = event.target === _this.canvas;
              if (wasCanvasTouched) {
                  event.preventDefault();
                  var touch = event.changedTouches[0];
                  _this._strokeEnd(touch);
              }
          };
          this.velocityFilterWeight = options.velocityFilterWeight || 0.7;
          this.minWidth = options.minWidth || 0.5;
          this.maxWidth = options.maxWidth || 2.5;
          this.throttle = ("throttle" in options ? options.throttle : 16);
          this.minDistance = ("minDistance" in options ? options.minDistance : 5);
          if (this.throttle) {
              this._strokeMoveUpdate = throttle(SignaturePad.prototype._strokeUpdate, this.throttle);
          }
          else {
              this._strokeMoveUpdate = SignaturePad.prototype._strokeUpdate;
          }
          this.dotSize = options.dotSize || function () {
              return (this.minWidth + this.maxWidth) / 2;
          };
          this.penColor = options.penColor || "black";
          this.backgroundColor = options.backgroundColor || "rgba(0,0,0,0)";
          this.onBegin = options.onBegin;
          this.onEnd = options.onEnd;
          this._ctx = canvas.getContext("2d");
          this.clear();
          this.on();
      }
      SignaturePad.prototype.clear = function () {
          var ctx = this._ctx;
          var canvas = this.canvas;
          ctx.fillStyle = this.backgroundColor;
          ctx.clearRect(0, 0, canvas.width, canvas.height);
          ctx.fillRect(0, 0, canvas.width, canvas.height);
          this._data = [];
          this._reset();
          this._isEmpty = true;
      };
      SignaturePad.prototype.fromDataURL = function (dataUrl, options, callback) {
          var _this = this;
          if (options === void 0) { options = {}; }
          var image = new Image();
          var ratio = options.ratio || window.devicePixelRatio || 1;
          var width = options.width || (this.canvas.width / ratio);
          var height = options.height || (this.canvas.height / ratio);
          this._reset();
          image.onload = function () {
              _this._ctx.drawImage(image, 0, 0, width, height);
              if (callback) {
                  callback();
              }
          };
          image.onerror = function (error) {
              if (callback) {
                  callback(error);
              }
          };
          image.src = dataUrl;
          this._isEmpty = false;
      };
      SignaturePad.prototype.toDataURL = function (type, encoderOptions) {
          if (type === void 0) { type = "image/png"; }
          switch (type) {
              case "image/svg+xml":
                  return this._toSVG();
              default:
                  return this.canvas.toDataURL(type, encoderOptions);
          }
      };
      SignaturePad.prototype.on = function () {
          this._handleMouseEvents();
          if ("ontouchstart" in window) {
              this._handleTouchEvents();
          }
      };
      SignaturePad.prototype.off = function () {
          this.canvas.style.msTouchAction = "auto";
          this.canvas.style.touchAction = "auto";
          this.canvas.removeEventListener("mousedown", this._handleMouseDown);
          this.canvas.removeEventListener("mousemove", this._handleMouseMove);
          document.removeEventListener("mouseup", this._handleMouseUp);
          this.canvas.removeEventListener("touchstart", this._handleTouchStart);
          this.canvas.removeEventListener("touchmove", this._handleTouchMove);
          this.canvas.removeEventListener("touchend", this._handleTouchEnd);
      };
      SignaturePad.prototype.isEmpty = function () {
          return this._isEmpty;
      };
      SignaturePad.prototype.fromData = function (pointGroups) {
          var _this = this;
          this.clear();
          this._fromData(pointGroups, function (_a) {
              var color = _a.color, curve = _a.curve;
              return _this._drawCurve({ color: color, curve: curve });
          }, function (_a) {
              var color = _a.color, point = _a.point;
              return _this._drawDot({ color: color, point: point });
          });
          this._data = pointGroups;
      };
      SignaturePad.prototype.toData = function () {
          return this._data;
      };
      SignaturePad.prototype._strokeBegin = function (event) {
          var newPointGroup = {
              color: this.penColor,
              points: []
          };
          this._data.push(newPointGroup);
          this._reset();
          this._strokeUpdate(event);
          if (typeof this.onBegin === "function") {
              this.onBegin(event);
          }
      };
      SignaturePad.prototype._strokeUpdate = function (event) {
          var x = event.clientX;
          var y = event.clientY;
          var point = this._createPoint(x, y);
          var lastPointGroup = this._data[this._data.length - 1];
          var lastPoints = lastPointGroup.points;
          var lastPoint = lastPoints.length > 0 && lastPoints[lastPoints.length - 1];
          var isLastPointTooClose = lastPoint ? point.distanceTo(lastPoint) <= this.minDistance : false;
          var color = lastPointGroup.color;
          if (!lastPoint || !(lastPoint && isLastPointTooClose)) {
              var curve = this._addPoint(point);
              if (!lastPoint) {
                  this._drawDot({ color: color, point: point });
              }
              else if (curve) {
                  this._drawCurve({ color: color, curve: curve });
              }
              lastPoints.push({
                  time: point.time,
                  x: point.x,
                  y: point.y
              });
          }
      };
      SignaturePad.prototype._strokeEnd = function (event) {
          this._strokeUpdate(event);
          if (typeof this.onEnd === "function") {
              this.onEnd(event);
          }
      };
      SignaturePad.prototype._handleMouseEvents = function () {
          this._mouseButtonDown = false;
          this.canvas.addEventListener("mousedown", this._handleMouseDown);
          this.canvas.addEventListener("mousemove", this._handleMouseMove);
          document.addEventListener("mouseup", this._handleMouseUp);
      };
      SignaturePad.prototype._handleTouchEvents = function () {
          this.canvas.style.msTouchAction = "none";
          this.canvas.style.touchAction = "none";
          this.canvas.addEventListener("touchstart", this._handleTouchStart);
          this.canvas.addEventListener("touchmove", this._handleTouchMove);
          this.canvas.addEventListener("touchend", this._handleTouchEnd);
      };
      SignaturePad.prototype._reset = function () {
          this._points = [];
          this._lastVelocity = 0;
          this._lastWidth = (this.minWidth + this.maxWidth) / 2;
          this._ctx.fillStyle = this.penColor;
      };
      SignaturePad.prototype._createPoint = function (x, y) {
          var rect = this.canvas.getBoundingClientRect();
          return new Point(x - rect.left, y - rect.top, new Date().getTime());
      };
      SignaturePad.prototype._addPoint = function (point) {
          var _points = this._points;
          _points.push(point);
          if (_points.length > 2) {
              if (_points.length === 3) {
                  _points.unshift(_points[0]);
              }
              var widths = this._calculateCurveWidths(_points[1], _points[2]);
              var curve = Bezier.fromPoints(_points, widths);
              _points.shift();
              return curve;
          }
          return null;
      };
      SignaturePad.prototype._calculateCurveWidths = function (startPoint, endPoint) {
          var velocity = (this.velocityFilterWeight * endPoint.velocityFrom(startPoint))
              + ((1 - this.velocityFilterWeight) * this._lastVelocity);
          var newWidth = this._strokeWidth(velocity);
          var widths = {
              end: newWidth,
              start: this._lastWidth
          };
          this._lastVelocity = velocity;
          this._lastWidth = newWidth;
          return widths;
      };
      SignaturePad.prototype._strokeWidth = function (velocity) {
          return Math.max(this.maxWidth / (velocity + 1), this.minWidth);
      };
      SignaturePad.prototype._drawCurveSegment = function (x, y, width) {
          var ctx = this._ctx;
          ctx.moveTo(x, y);
          ctx.arc(x, y, width, 0, 2 * Math.PI, false);
          this._isEmpty = false;
      };
      SignaturePad.prototype._drawCurve = function (_a) {
          var color = _a.color, curve = _a.curve;
          var ctx = this._ctx;
          var widthDelta = curve.endWidth - curve.startWidth;
          var drawSteps = Math.floor(curve.length()) * 2;
          ctx.beginPath();
          ctx.fillStyle = color;
          for (var i = 0; i < drawSteps; i += 1) {
              var t = i / drawSteps;
              var tt = t * t;
              var ttt = tt * t;
              var u = 1 - t;
              var uu = u * u;
              var uuu = uu * u;
              var x = uuu * curve.startPoint.x;
              x += 3 * uu * t * curve.control1.x;
              x += 3 * u * tt * curve.control2.x;
              x += ttt * curve.endPoint.x;
              var y = uuu * curve.startPoint.y;
              y += 3 * uu * t * curve.control1.y;
              y += 3 * u * tt * curve.control2.y;
              y += ttt * curve.endPoint.y;
              var width = curve.startWidth + (ttt * widthDelta);
              this._drawCurveSegment(x, y, width);
          }
          ctx.closePath();
          ctx.fill();
      };
      SignaturePad.prototype._drawDot = function (_a) {
          var color = _a.color, point = _a.point;
          var ctx = this._ctx;
          var width = typeof this.dotSize === "function" ? this.dotSize() : this.dotSize;
          ctx.beginPath();
          this._drawCurveSegment(point.x, point.y, width);
          ctx.closePath();
          ctx.fillStyle = color;
          ctx.fill();
      };
      SignaturePad.prototype._fromData = function (pointGroups, drawCurve, drawDot) {
          for (var _i = 0, pointGroups_1 = pointGroups; _i < pointGroups_1.length; _i++) {
              var group = pointGroups_1[_i];
              var color = group.color, points = group.points;
              if (points.length > 1) {
                  for (var j = 0; j < points.length; j += 1) {
                      var basicPoint = points[j];
                      var point = new Point(basicPoint.x, basicPoint.y, basicPoint.time);
                      this.penColor = color;
                      if (j === 0) {
                          this._reset();
                      }
                      var curve = this._addPoint(point);
                      if (curve) {
                          drawCurve({ color: color, curve: curve });
                      }
                  }
              }
              else {
                  this._reset();
                  drawDot({
                      color: color,
                      point: points[0]
                  });
              }
          }
      };
      SignaturePad.prototype._toSVG = function () {
          var _this = this;
          var pointGroups = this._data;
          var ratio = Math.max(window.devicePixelRatio || 1, 1);
          var minX = 0;
          var minY = 0;
          var maxX = this.canvas.width / ratio;
          var maxY = this.canvas.height / ratio;
          var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
          svg.setAttribute("width", this.canvas.width.toString());
          svg.setAttribute("height", this.canvas.height.toString());
          this._fromData(pointGroups, function (_a) {
              var color = _a.color, curve = _a.curve;
              var path = document.createElement("path");
              if (!isNaN(curve.control1.x) &&
                  !isNaN(curve.control1.y) &&
                  !isNaN(curve.control2.x) &&
                  !isNaN(curve.control2.y)) {
                  var attr = "M " + curve.startPoint.x.toFixed(3) + "," + curve.startPoint.y.toFixed(3) + " "
                      + ("C " + curve.control1.x.toFixed(3) + "," + curve.control1.y.toFixed(3) + " ")
                      + (curve.control2.x.toFixed(3) + "," + curve.control2.y.toFixed(3) + " ")
                      + (curve.endPoint.x.toFixed(3) + "," + curve.endPoint.y.toFixed(3));
                  path.setAttribute("d", attr);
                  path.setAttribute("stroke-width", (curve.endWidth * 2.25).toFixed(3));
                  path.setAttribute("stroke", color);
                  path.setAttribute("fill", "none");
                  path.setAttribute("stroke-linecap", "round");
                  svg.appendChild(path);
              }
          }, function (_a) {
              var color = _a.color, point = _a.point;
              var circle = document.createElement("circle");
              var dotSize = typeof _this.dotSize === "function" ? _this.dotSize() : _this.dotSize;
              circle.setAttribute("r", dotSize.toString());
              circle.setAttribute("cx", point.x.toString());
              circle.setAttribute("cy", point.y.toString());
              circle.setAttribute("fill", color);
              svg.appendChild(circle);
          });
          var prefix = "data:image/svg+xml;base64,";
          var header = "<svg"
              + " xmlns=\"http://www.w3.org/2000/svg\""
              + " xmlns:xlink=\"http://www.w3.org/1999/xlink\""
              + (" viewBox=\"" + minX + " " + minY + " " + maxX + " " + maxY + "\"")
              + (" width=\"" + maxX + "\"")
              + (" height=\"" + maxY + "\"")
              + ">";
          var body = svg.innerHTML;
          if (body === undefined) {
              var dummy = document.createElement("dummy");
              var nodes = svg.childNodes;
              dummy.innerHTML = "";
              for (var i = 0; i < nodes.length; i += 1) {
                  dummy.appendChild(nodes[i].cloneNode(true));
              }
              body = dummy.innerHTML;
          }
          var footer = "</svg>";
          var data = header + body + footer;
          return prefix + btoa(data);
      };
      return SignaturePad;
  }());

  return SignaturePad;

})));

</script>
@endpush
