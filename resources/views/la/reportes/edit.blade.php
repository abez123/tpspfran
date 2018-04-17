@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/reportes') }}">Reporte</a> :
@endsection
@section("contentheader_description", $reporte->$view_col)
@section("section", "Reportes")
@section("section_url", url(config('laraadmin.adminRoute') . '/reportes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Reportes Edit : ".$reporte->$view_col)

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
				{!! Form::model($reporte, ['route' => [config('laraadmin.adminRoute') . '.reportes.update', $reporte->id ], 'method'=>'PUT', 'id' => 'reporte-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'sucursal_id')
					@la_input($module, 'nombrereporte')
					@la_input($module, 'archivorep')
					@la_input($module, 'mes')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/reportes') }}">Cancel</a></button>
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
	$("#reporte-edit-form").validate({
		
	});
});
</script>
@endpush
