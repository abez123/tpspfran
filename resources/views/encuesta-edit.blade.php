@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Editar Encuesta</h2>
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
     <h3><a href="{{url('encuestas')}}">Regresar</a></h3>
  </div>
  <div class="box">
  <div class="box-header">
    
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
       {!! Form::model($encuestaisf, ['route' => ['encuestas.update', $encuestaisf->id ], 'method'=>'PUT', 'id' => 'encuestaisf-edit-form']) !!}
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
                    <br>
          <div class="form-group">
            {!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url( '/encuestas') }}">Cancelar</a></button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.scripts')


<script>
$(function () {
  $("#encuestaisfs-edit-form").validate({
    
  });
});
</script>

