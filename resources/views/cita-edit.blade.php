@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Crear una Cita</h2>
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
  <div class="box-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        {!! Form::model($cita, ['route' => ['citas.update', $cita->id ], 'method'=>'PUT', 'id' => 'cita-edit-form']) !!}
          @la_form($module)
          
          {{--
          @la_input($module, 'sucursal_id')
          @la_input($module, 'servicio_id')
          @la_input($module, 'fecha')
          @la_input($module, 'estatus')
          @la_input($module, 'cliente_id')
          --}}
                    <br>
          <div class="form-group">
            {!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url( '/user_profile#cita') }}">Cancel</a></button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script>
$(function () {
  $("#cita-edit-form").validate({
    
  });
});
</script>
@endpush
