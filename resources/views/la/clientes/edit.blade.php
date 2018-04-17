@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/clientes') }}">Cliente</a> :
@endsection
@section("contentheader_description", $cliente->$view_col)
@section("section", "Clientes")
@section("section_url", url(config('laraadmin.adminRoute') . '/clientes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Clientes Edit : ".$cliente->$view_col)

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
				{!! Form::model($cliente, ['route' => [config('laraadmin.adminRoute') . '.clientes.update', $cliente->id ], 'method'=>'PUT', 'id' => 'cliente-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nombrecompleto')
					@la_input($module, 'telcasa')
					@la_input($module, 'celular')
					@la_input($module, 'correo')
					@la_input($module, 'nota')
					--}}
					<input type="hidden" name="role" value="4">
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/clientes') }}">Cancel</a></button>
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
	$("#cliente-edit-form").validate({
		
	});
});
</script>
@endpush
