@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/franquiciatarios') }}">Franquiciatario</a> :
@endsection
@section("contentheader_description", $franquiciatario->$view_col)
@section("section", "Franquiciatarios")
@section("section_url", url(config('laraadmin.adminRoute') . '/franquiciatarios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Franquiciatarios Edit : ".$franquiciatario->$view_col)

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
				{!! Form::model($franquiciatario, ['route' => [config('laraadmin.adminRoute') . '.franquiciatarios.update', $franquiciatario->id ], 'method'=>'PUT', 'id' => 'franquiciatario-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombrecompletofran')
					@la_input($module, 'telefonocasa')
					@la_input($module, 'celularfran')
					@la_input($module, 'correofran')
					@la_input($module, 'franquicias_id')
					@la_input($module, 'domiciliofran')
					--}}
						<?php $role = App\Role::where('name','FRANQUICIATARIO')->select(array('roles.id'))->value('id'); ?>
					
				<input name="role" type="hidden" value="{{ $role }}">
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/franquiciatarios') }}">Cancel</a></button>
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
	$("#franquiciatario-edit-form").validate({
		
	});
});
</script>
@endpush