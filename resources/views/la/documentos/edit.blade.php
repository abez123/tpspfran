@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/documentos') }}">Documento</a> :
@endsection
@section("contentheader_description", $documento->$view_col)
@section("section", "Documentos")
@section("section_url", url(config('laraadmin.adminRoute') . '/documentos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Documentos Edit : ".$documento->$view_col)

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
				{!! Form::model($documento, ['route' => [config('laraadmin.adminRoute') . '.documentos.update', $documento->id ], 'method'=>'PUT', 'id' => 'documento-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombredocu')
					@la_input($module, 'conceptodocu')
					@la_input($module, 'urldocu')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/documentos') }}">Cancel</a></button>
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
	$("#documento-edit-form").validate({
		
	});
});
</script>
@endpush
