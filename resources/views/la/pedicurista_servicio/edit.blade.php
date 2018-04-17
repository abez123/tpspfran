@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/Pedicurista_Servicio') }}">Pedicurista Servicio</a> :
@endsection
@section("contentheader_description", $pedicurista_servicio->$view_col)
@section("section", "Pedicurista Servicios")
@section("section_url", url(config('laraadmin.adminRoute') . '/Pedicurista_Servicio'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Pedicurista Servicios Edit : ".$pedicurista_servicio->$view_col)

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
				{!! Form::model($pedicurista_servicio, ['route' => [config('laraadmin.adminRoute') . '.Pedicurista_Servicio.update', $pedicurista_servicio->id ], 'method'=>'PUT', 'id' => 'pedicurista_servicio-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'pedicurista_id')
					@la_input($module, 'servicio_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/Pedicurista_Servicio') }}">Cancel</a></button>
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
	$("#pedicurista_servicio-edit-form").validate({
		
	});
});
</script>
@endpush
