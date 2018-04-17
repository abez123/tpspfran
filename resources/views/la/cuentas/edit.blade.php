@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/cuentas') }}">Cuenta</a> :
@endsection
@section("contentheader_description", $cuenta->$view_col)
@section("section", "Cuentas")
@section("section_url", url(config('laraadmin.adminRoute') . '/cuentas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Cuentas Edit : ".$cuenta->$view_col)

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
				{!! Form::model($cuenta, ['route' => [config('laraadmin.adminRoute') . '.cuentas.update', $cuenta->id ], 'method'=>'PUT', 'id' => 'cuenta-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'franquicia_id')
					@la_input($module, 'folio')
					@la_input($module, 'monto')
					@la_input($module, 'tipofactura')
					@la_input($module, 'pdf')
					@la_input($module, 'xml')
					@la_input($module, 'fecha')
					@la_input($module, 'concepto')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/cuentas') }}">Cancel</a></button>
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
	$("#cuenta-edit-form").validate({
		
	});
});
</script>
@endpush
