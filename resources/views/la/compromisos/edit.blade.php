@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/compromisos') }}">Compromiso</a> :
@endsection
@section("contentheader_description", $compromiso->$view_col)
@section("section", "Compromisos")
@section("section_url", url(config('laraadmin.adminRoute') . '/compromisos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Compromisos Edit : ".$compromiso->$view_col)

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
				{!! Form::model($compromiso, ['route' => [config('laraadmin.adminRoute') . '.compromisos.update', $compromiso->id ], 'method'=>'PUT', 'id' => 'compromiso-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'checklist_id')
					@la_input($module, 'comentariocompromiso')
					@la_input($module, 'fechacompromiso')
					@la_input($module, 'fechaentrega')
					@la_input($module, 'estatuscompromiso')
					@la_input($module, 'evidencia')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/compromisos') }}">Cancel</a></button>
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
	$("#compromiso-edit-form").validate({
		
	});
});
</script>
@endpush
