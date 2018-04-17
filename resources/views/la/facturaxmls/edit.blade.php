@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/facturaxmls') }}">FacturaXML</a> :
@endsection
@section("contentheader_description", $facturaxml->$view_col)
@section("section", "FacturaXMLs")
@section("section_url", url(config('laraadmin.adminRoute') . '/facturaxmls'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FacturaXMLs Edit : ".$facturaxml->$view_col)

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
				{!! Form::model($facturaxml, ['route' => [config('laraadmin.adminRoute') . '.facturaxmls.update', $facturaxml->id ], 'method'=>'PUT', 'id' => 'facturaxml-edit-form']) !!}
					
					@la_input($module, 'xml')
					@la_input($module, 'pdf')
					@la_input($module, 'estatus')
			
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/facturaxmls') }}">Cancel</a></button>
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
	$("#facturaxml-edit-form").validate({
		
	});
});
</script>
@endpush
