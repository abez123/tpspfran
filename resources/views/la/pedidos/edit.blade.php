@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/pedidos') }}">Pedido</a> :
@endsection
@section("contentheader_description", $pedido->$view_col)
@section("section", "Pedidos")
@section("section_url", url(config('laraadmin.adminRoute') . '/pedidos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Pedidos Edit : ".$pedido->$view_col)

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
				{!! Form::model($pedido, ['route' => [config('laraadmin.adminRoute') . '.pedidos.update', $pedido->id ], 'method'=>'PUT', 'id' => 'pedido-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'cliente_id')
					@la_input($module, 'producto')
					@la_input($module, 'cantidad')
					@la_input($module, 'tipopago')
					@la_input($module, 'entrega')
					@la_input($module, 'observacion')
					@la_input($module, 'domicilio')
					@la_input($module, 'estatus')
					@la_input($module, 'factura')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/pedidos') }}">Cancel</a></button>
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
	$("#pedido-edit-form").validate({
		
	});
});
</script>
@endpush
