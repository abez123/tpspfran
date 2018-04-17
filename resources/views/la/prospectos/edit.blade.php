@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/prospectos') }}">Prospecto</a> :
@endsection
@section("contentheader_description", $prospecto->$view_col)
@section("section", "Prospectos")
@section("section_url", url(config('laraadmin.adminRoute') . '/prospectos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Prospectos Edit : ".$prospecto->$view_col)

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
				{!! Form::model($prospecto, ['route' => [config('laraadmin.adminRoute') . '.prospectos.update', $prospecto->id ], 'method'=>'PUT', 'id' => 'prospecto-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'fecha')
					@la_input($module, 'nombrecompletoprosp')
					@la_input($module, 'telefono')
					@la_input($module, 'celular')
					@la_input($module, 'email')
					@la_input($module, 'estadocivil')
					@la_input($module, 'experiencia')
					@la_input($module, 'cualexperiancia')
					@la_input($module, 'sutrabajoactual')
					@la_input($module, 'negociopropio')
					@la_input($module, 'experianciafran')
					@la_input($module, 'cualexperianciafran')
					@la_input($module, 'queciudad')
					@la_input($module, 'localpropio')
					@la_input($module, 'uicacionmetros')
					@la_input($module, 'fechadeseo')
					@la_input($module, 'solventadapor')
					@la_input($module, 'especificarotro')
					@la_input($module, 'cargoquien')
					@la_input($module, 'inversion')
					@la_input($module, 'comentarios')
					@la_input($module, 'atendidopor')
					@la_input($module, 'fechaprimercontacto')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/prospectos') }}">Cancel</a></button>
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
	$("#prospecto-edit-form").validate({
		
	});
});
</script>
@endpush
