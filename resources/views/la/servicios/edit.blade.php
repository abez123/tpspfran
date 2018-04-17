@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/servicios') }}">Servicio</a> :
@endsection
@section("contentheader_description", $servicio->$view_col)
@section("section", "Servicios")
@section("section_url", url(config('laraadmin.adminRoute') . '/servicios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Servicios Edit : ".$servicio->$view_col)

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
				{!! Form::model($servicio, ['route' => [config('laraadmin.adminRoute') . '.servicios.update', $servicio->id ], 'method'=>'PUT', 'id' => 'servicio-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombreservicio')
					@la_input($module, 'precio')
					@la_input($module, 'duracion')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/servicios') }}">Cancel</a></button>
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
	$("#servicio-edit-form").validate({
		
	});
});
</script>
@endpush
