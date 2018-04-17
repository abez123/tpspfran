@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/horarios') }}">Horario</a> :
@endsection
@section("contentheader_description", $horario->$view_col)
@section("section", "Horarios")
@section("section_url", url(config('laraadmin.adminRoute') . '/horarios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Horarios Edit : ".$horario->$view_col)

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
				{!! Form::model($horario, ['route' => [config('laraadmin.adminRoute') . '.horarios.update', $horario->id ], 'method'=>'PUT', 'id' => 'horario-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'pedicurista_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/horarios') }}">Cancel</a></button>
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
	$("#horario-edit-form").validate({
		
	});
});
</script>
@endpush
