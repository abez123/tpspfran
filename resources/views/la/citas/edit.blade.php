@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/citas') }}">Cita</a> :
@endsection
@section("contentheader_description", $cita->$view_col)
@section("section", "Citas")
@section("section_url", url(config('laraadmin.adminRoute') . '/citas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Citas Edit : ".$cita->$view_col)

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
				{!! Form::model($cita, ['route' => [config('laraadmin.adminRoute') . '.citas.update', $cita->id ], 'method'=>'PUT', 'id' => 'cita-edit-form']) !!}
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
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/citas') }}">Cancel</a></button>
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
	$("#cita-edit-form").validate({
		
	});
});
</script>
@endpush
