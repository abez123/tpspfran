@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/incapacidads') }}">Incidencias</a> :
@endsection
@section("contentheader_description", $incapacidad->$view_col)
@section("section", "Incidencias")
@section("section_url", url(config('laraadmin.adminRoute') . '/incapacidads'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Incidencias Edit : ".$incapacidad->$view_col)

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
				{!! Form::model($incapacidad, ['route' => [config('laraadmin.adminRoute') . '.incapacidads.update', $incapacidad->id ], 'method'=>'PUT', 'id' => 'incapacidad-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'pedicurista_id')
					@la_input($module, 'incapacidadinica')
					@la_input($module, 'incapacidadtermina')
					@la_input($module, 'tipo')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/incapacidads') }}">Cancel</a></button>
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
	$("#incapacidad-edit-form").validate({
		
	});
});
</script>
@endpush
