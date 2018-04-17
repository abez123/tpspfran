@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Editar Prospecto</h2>
      </div>
    </div>
  </div>


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
  <div class="box">
  <div class="box-header">
    
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        {!! Form::model($prospecto, ['route' => ['prospectos.update', $prospecto->id ], 'method'=>'PUT', 'id' => 'prospecto-edit-form']) !!}
         
           <div class="form-group">
                     <label>Fecha:</label>
             <div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder="Fecha" name="fecha" value="{{{ old('fecha', isset($prospecto) ? $prospecto->fecha : null) }}}" required> 
              </div>
           </div>
          <div class="form-group">
                    <label>Nombre Compeleto:</label>
         <input type='text' class="form-control" placeholder="Nombre Completo" name="nombrecompletoprosp" value="{{{ old('nombrecompletoprosp', isset($prospecto) ? $prospecto->nombrecompletoprosp : null) }}}" required> 
           </div>

        <div class="form-group">
                    <label>Teléfono:</label>
         <input type='tel' class="form-control" placeholder="Teléfono" name="telefono"  value="{{{ old('telefono', isset($prospecto) ? $prospecto->telefono : null) }}}"> 
           </div>

                <div class="form-group">
                    <label>Celular:</label>
         <input type='tel' class="form-control" placeholder="Celular" name="celular" value="{{{ old('celular', isset($prospecto) ? $prospecto->celular : null) }}}"> 
           </div>
        <div class="form-group">
                    <label>Email:</label>
         <input type='email' class="form-control" placeholder="Email" name="email" value="{{{ old('email', isset($prospecto) ? $prospecto->email : null) }}}"> 
           </div>
       <div class="form-group">
                    <label>Estado Civil:</label>
       <select class="form-control select2" name="estadocivil" required>
        <option value="Soletero">Soletero</option>
        <option value="Casado">Casado</option>
        <option value="Divorciado">Divorciado</option>
        <option value="Viudo">Viudo</option>
        <option value="Uniion Libre">Uniion Libre</option>
      </select>
           </div>
     <div class="form-group">
                    <label>¿Cuenta con experiencia en Salud y Belleza?</label>
                    <br>
          <input type="radio" name="experiencia" value="Si"> Si<br>
               <input type="radio" name="experiencia" value="No"> No<br>
           </div>
<br>
                <div class="form-group">
                    <label>Si tiene experiencia ¿Cual?</label>

           <textarea name="cualexperiancia" placeholder="$prospecto->cualexperiancia " rows="4" cols="50" >{{{ $prospecto->cualexperiancia }}}</textarea>
         </div>

          <div class="form-group">
                    <label>  ¿A qué se dedica actualmente?</label>

           <textarea name="sutrabajoactual" placeholder="¿A qué se dedica actualmente?" rows="4" cols="50">{{{ $prospecto->sutrabajoactual }}}</textarea>
         </div>
      
<div class="form-group">
                    <label>¿Posee algún negocio? </label>
                    <br>
          <input type="radio" name="negociopropio" value="Si"> Si<br>
               <input type="radio" name="negociopropio" value="No"> No<br>
           </div>
<br>
           <div class="form-group">
                    <label> ¿Cuenta con experiencia en el sector franquicia?</label>
                    <br>
          <input type="radio" name="experianciafran" value="Si" @if(old('experianciafran') ==  'Si') checked="checked" @endif> Si<br>
               <input type="radio" name="experianciafran" value="No" @if(old('experianciafran') ==  'No') checked="checked" @endif> No<br>
           </div>
          
   
         <div class="form-group">
                    <label> Especificar si tiene experiencia en Franquicias</label>

           <textarea name="cualexperianciafran" placeholder="Especificar si tiene experiencia en Franquicias" rows="4" cols="50">{{{ $prospecto->cualexperianciafran}}}</textarea>
         </div>
    
     <div class="form-group">
                    <label> ¿En qué ciudad le interesa abrir una franquicia?</label>
      <input type='text' class="form-control" placeholder="¿En qué ciudad le interesa abrir una franquicia?" name="queciudad" value="{{{ old('queciudad', isset($prospecto) ? $prospecto->queciudad : null) }}}"> 
         </div>
          
    <div class="form-group">
                    <label> ¿Cuenta con local comercial?</label>
                    <br>
          <input type="radio" name="localpropio" value="Si"> Si<br>
               <input type="radio" name="localpropio" value="No"> No<br>
           </div>

       <div class="form-group">
                    <label> En caso de tener local propio anote ubicación y metros</label>

           <textarea name="uicacionmetros" placeholder=" En caso de tener local propio anote ubicación y metros" rows="4" cols="50">{{{ $prospecto->uicacionmetros}}}</textarea>
         </div>

 <div class="form-group">
                     <label>Fecha en que desearía iniciar operación de su franquicia.</label>
             <div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder="Fecha" name="fechadeseo" value="{{{ old('fechadeseo', isset($prospecto) ? $prospecto->fechadeseo : null) }}}"> 
              </div>
           </div>
          
    <div class="form-group">
                    <label>¿Su inversión está solventada por? </label>
       <select class="form-control select2" name="solventadapor" required>
        <option value="Usted Solo">Usted Solo</option>
        <option value="Sociedad">Sociedad</option>
        <option value="Familiar">Familiar</option>
        <option value="Financiamiento">Financiamiento</option>
        <option value="Otro">Otro</option>
      </select>
           </div>

   <div class="form-group">
                    <label>  Si la opción es Otro o Financiamiento favor de Especificar</label>

           <textarea name="especificarotro" placeholder="Si la opción es Otro o Financiamiento favor de Especificar" rows="4" cols="50">{{{ $prospecto->especificarotro}}}</textarea>
         </div>



         <div class="form-group">
                    <label> A cargo de quién estaría la operación de su franquicia?</label>
      <input type='text' class="form-control" placeholder="A cargo de quién estaría la operación de su franquicia?" name="cargoquien"  value="{{{ old('cargoquien', isset($prospecto) ? $prospecto->cargoquien : null) }}}"> 
         </div>


   <div class="form-group">
                    <label>  A cuánto asciende el monto de lo que Usted desea invertir? </label>
       <select  class="form-control select2" name="inversion" required>
        <option value="Menos de $500,000.00">Menos de $500,000.00</option>
        <option value="De $5000,000.00 a $1,000,000.00">De $5000,000.00 a $1,000,000.00</option>
        <option value="Arriba de $1,000,000.00">Arriba de $1,000,000.00</option>
     
      </select>
     </div>

 <div class="form-group">
                    <label>Comentarios</label>

           <textarea name="comentarios" placeholder=" Comentarios" rows="4" cols="50">{{{ $prospecto->comentarios}}}</textarea>
         </div>


          <div class="form-group">
                    <label> Antendido por: </label>
       <select  class="form-control select2" name="atendidopor" required>
        <option value="Osiris Ruvalcaba">Osiris Ruvalcaba</option>
        <option value="Clarisa Macias">Clarisa Macias</option>
        <option value="Dr Ignacio Garcia de la Paz">Dr Ignacio Garcia de la Paz</option>
     <option value="Lic.. Ignacio Garcia de la Paz">Lic.. Ignacio Garcia de la Paz</option>
     <option value="Omar Garcia de la Paz">Omar Garcia de la Paz</option>
      </select>
           </div>
          
  <div class="form-group">
                     <label> Fecha de próximo contacto</label>
             <div class='input-group datetime' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder=" Fecha de próximo contacto" name="fechaprimercontacto" value="{{{ old('fechaprimercontacto') }}}"> 
              </div>
           </div>
                    <br>
          <div class="form-group">
            {!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url('/prospectos') }}">Cancel</a></button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.scripts')


<script>
$(function () {
  $("#cita-edit-form").validate({
    
  });
});
</script>

