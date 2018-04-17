@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/enlaces') }}">Enlace</a> :
@endsection
@section("contentheader_description", $enlace->$view_col)
@section("section", "Enlaces")
@section("section_url", url(config('laraadmin.adminRoute') . '/enlaces'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Enlaces Edit : ".$enlace->$view_col)

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
				{!! Form::model($enlace, ['route' => [config('laraadmin.adminRoute') . '.enlaces.update', $enlace->id ], 'method'=>'PUT', 'id' => 'enlace-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombrenenlace')
					@la_input($module, 'enlace')
					@la_input($module, 'descripcion')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/enlaces') }}">Cancel</a></button>
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
	$("#enlace-edit-form").validate({
		
	});
});
</script>
@endpush
