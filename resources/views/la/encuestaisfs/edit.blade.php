@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/encuestaisfs') }}">EncuestaISF</a> :
@endsection
@section("contentheader_description", $encuestaisf->$view_col)
@section("section", "EncuestaISFs")
@section("section_url", url(config('laraadmin.adminRoute') . '/encuestaisfs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "EncuestaISFs Edit : ".$encuestaisf->$view_col)

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
				{!! Form::model($encuestaisf, ['route' => [config('laraadmin.adminRoute') . '.encuestaisfs.update', $encuestaisf->id ], 'method'=>'PUT', 'id' => 'encuestaisf-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'franquiciatario_id')
					@la_input($module, 'recibirfactura')
					@la_input($module, 'pedidorecibido')
					@la_input($module, 'notificarpedido')
					@la_input($module, 'paqueteria')
					@la_input($module, 'almacen')
					@la_input($module, 'mes')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/encuestaisfs') }}">Cancel</a></button>
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
	$("#encuestaisf-edit-form").validate({
		
	});
});
</script>
@endpush
