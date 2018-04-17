@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/noticias') }}">Noticia</a> :
@endsection
@section("contentheader_description", $noticia->$view_col)
@section("section", "Noticias")
@section("section_url", url(config('laraadmin.adminRoute') . '/noticias'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Noticias Edit : ".$noticia->$view_col)

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
				{!! Form::model($noticia, ['route' => [config('laraadmin.adminRoute') . '.noticias.update', $noticia->id ], 'method'=>'PUT', 'id' => 'noticia-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'imagen')
					@la_input($module, 'url')
					@la_input($module, 'titulo')
					@la_input($module, 'text')
					@la_input($module, 'escritopor')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/noticias') }}">Cancel</a></button>
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
	$("#noticia-edit-form").validate({
		
	});
});
</script>
@endpush
