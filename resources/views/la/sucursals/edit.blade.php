@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/sucursals') }}">Sucursal</a> :
@endsection
@section("contentheader_description", $sucursal->$view_col)
@section("section", "Sucursals")
@section("section_url", url(config('laraadmin.adminRoute') . '/sucursals'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Sucursals Edit : ".$sucursal->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($sucursal, ['route' => [config('laraadmin.adminRoute') . '.sucursals.update', $sucursal->id ], 'method'=>'PUT', 'id' => 'sucursal-edit-form']) !!}
				
					
					@la_input($module, 'nombresuc')
					@la_input($module, 'domicilio')
					@la_input($module, 'lunes')
					@la_input($module, 'martes')
					@la_input($module, 'miercoles')
					@la_input($module, 'jueves')
					@la_input($module, 'viernes')
					@la_input($module, 'sabado')
					@la_input($module, 'domingo')
					@la_input($module, 'horarioabierto')
					@la_input($module, 'horariocerrado')
					@la_input($module, 'domingohorarioab')
					@la_input($module, 'domingohorariocer')
					@la_input($module, 'telefono')
					@la_input($module, 'sucursal_id')
					@la_input($module, 'lat')
					@la_input($module, 'lng')
					@la_input($module, 'gerente_id')
				
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/sucursals') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#sucursal-edit-form").validate({
		
	});
});
</script>
@endpush
