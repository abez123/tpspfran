@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Lllenar una Encuesta</h2>
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

<div class="box">
  <div class="box-header">
    
  </div>
  <div class="box">
  <div class="box-header">
    
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @la_access("EncuestaISFs", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Encuesta</h4>
      </div>
      {!! Form::open(['action' => 'EncuestasController@store', 'id' => 'encuestaisf-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">
                    @la_form($module)
          
          {{--
          @la_input($module, 'franquiciatario_id')
          @la_input($module, 'recibirfactura')
          @la_input($module, 'pedidorecibido')
          @la_input($module, 'notificarpedido')
          @la_input($module, 'paqueteria')
          @la_input($module, 'almacen')
          @la_input($module, 'mes')
          --}}
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

@include('layouts.partials.scripts')


<script>
$(function () {
  $("#cita-add-form").validate({
    
  });
});
</script>

