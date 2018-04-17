@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/cincosmethods') }}">CincosMethod</a> :
@endsection
@section("contentheader_description", $cincosmethod->$view_col)
@section("section", "CincosMethods")
@section("section_url", url(config('laraadmin.adminRoute') . '/cincosmethods'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CincosMethods Edit : ".$cincosmethod->$view_col)

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
				{!! Form::model($cincosmethod, ['route' => [config('laraadmin.adminRoute') . '.cincosmethods.update', $cincosmethod->id ], 'method'=>'PUT', 'id' => 'cincosmethod-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'unneed')
					@la_input($module, 'observacionsort1')
					@la_input($module, 'necesary')
					@la_input($module, 'observacionsort2')
					@la_input($module, 'uneedinventory')
					@la_input($module, 'observacionsort3')
					@la_input($module, 'clutter')
					@la_input($module, 'observacionsort4')
					@la_input($module, 'tagged')
					@la_input($module, 'observacionsort5')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/cincosmethods') }}">Cancel</a></button>
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
	$("#cincosmethod-edit-form").validate({
		
	});
});
</script>
@endpush
