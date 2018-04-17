@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/pedicuristas') }}">Pedicurista</a> :
@endsection
@section("contentheader_description", $pedicurista->$view_col)
@section("section", "Pedicuristas")
@section("section_url", url(config('laraadmin.adminRoute') . '/pedicuristas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Pedicuristas Edit : ".$pedicurista->$view_col)

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
				{!! Form::model($pedicurista, ['route' => [config('laraadmin.adminRoute') . '.pedicuristas.update', $pedicurista->id ], 'method'=>'PUT', 'id' => 'pedicurista-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombrecompletoped')
					@la_input($module, 'sucursal_id')
					@la_input($module, 'imagen')
					@la_input($module, 'pediestandard')
					@la_input($module, 'pediespecial')
					@la_input($module, 'manicure')
					@la_input($module, 'masaje')
					@la_input($module, 'gelish')
					@la_input($module, 'horario_entrada')
					@la_input($module, 'horario_salida')
					@la_input($module, 'comidainicia')
					@la_input($module, 'comidaduracion')
					@la_input($module, 'comidatermina')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/pedicuristas') }}">Cancel</a></button>
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
	$("#pedicurista-edit-form").validate({
		
	});
});
</script>
@endpush
