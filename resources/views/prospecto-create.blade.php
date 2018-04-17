@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Alta Prosepctos</h2>
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
         {!! Form::open(['action' => 'ProspectosController@store', 'id' => 'prospecto-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">
        
     
           <div class="form-group">
                   
            
                   <input type='hidden' class="form-control" value="{{date('Y-m-d')}}"  name="fecha"> 
             
           </div>
<div class="form-group">
<label class="control-label"  for="expo">Expo *:</label> <select
							style="width: 100%" name="expo" id="expo"
							class="form-control js-example-basic-select"> @foreach($expos as $item)
							<option value="{{$item->id}}"
								@if(!empty($expos))
                                        @if($item->id==$expo)
								            selected="selected"
								        @endif
								@endif >{{$item->nombreexpo}}</option>
							@endforeach
						</select>
</div>
          <div class="form-group">
                    <label>Nombre Compeleto:</label>
         <input type='text' class="form-control" placeholder="Nombre Completo" name="nombrecompletoprosp" required> 
           </div>

        <div class="form-group">
                    <label>Teléfono:</label>
         <input type='tel' class="form-control" placeholder="Teléfono" name="telefono" required> 
           </div>

                <div class="form-group">
                    <label>Celular:</label>
         <input type='tel' class="form-control" placeholder="Celular" name="celular" required> 
           </div>
        <div class="form-group">
                    <label>Email:</label>
         <input type='email' class="form-control" placeholder="Email" name="email" required> 
           </div>
 <div class="form-group">
                    <label> ¿En qué ciudad y/o país le interesa abrir una franquicia?</label>
      <input type='text' class="form-control" placeholder="¿En qué ciudad le interesa abrir una franquicia?" name="queciudad"> 
         </div>
<!--
       <div class="form-group">
                    <label>Estado Civil:</label>
       <select  class="form-control select2" name="estadocivil" required>
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

           <textarea name="cualexperiancia" placeholder="Si tiene experiencia ¿Cual?" rows="4" cols="50"></textarea>
         </div>

          <div class="form-group">
                    <label>  ¿A qué se dedica actualmente?</label>

           <textarea name="sutrabajoactual" placeholder="¿A qué se dedica actualmente?" rows="4" cols="50"></textarea>
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
          <input type="radio" name="experianciafran" value="Si"> Si<br>
               <input type="radio" name="experianciafran" value="No"> No<br>
           </div>
          
   
         <div class="form-group">
                    <label> Especificar si tiene experiencia en Franquicias</label>

           <textarea name="cualexperianciafran" placeholder="Especificar si tiene experiencia en Franquicias" rows="4" cols="50"></textarea>
         </div>
    
    
          
    <div class="form-group">
                    <label> ¿Cuenta con local comercial?</label>
                    <br>
          <input type="radio" name="localpropio" value="Si"> Si<br>
               <input type="radio" name="localpropio" value="No"> No<br>
           </div>

       <div class="form-group">
                    <label> En caso de tener local propio anote ubicación y metros</label>

           <textarea name="uicacionmetros" placeholder=" En caso de tener local propio anote ubicación y metros" rows="4" cols="50"></textarea>
         </div>

 <div class="form-group">
                     <label>Fecha en que desearía iniciar operación de su franquicia.</label>
             <div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" placeholder="Fecha" name="fechadeseo" required> 
              </div>
           </div>
          
    <div class="form-group">
                    <label>¿Su inversión está solventada por? </label>
       <select  class="form-control select2" name="solventadapor" required>
        <option value="Usted Solo">Usted Solo</option>
        <option value="Sociedad">Sociedad</option>
        <option value="Familiar">Familiar</option>
        <option value="Financiamiento">Financiamiento</option>
        <option value="Otro">Otro</option>
      </select>
           </div>

   <div class="form-group">
                    <label>  Si la opción es Otro o Financiamiento favor de Especificar</label>

           <textarea name="especificarotro" placeholder="Si la opción es Otro o Financiamiento favor de Especificar" rows="4" cols="50"></textarea>
         </div>



         <div class="form-group">
                    <label> A cargo de quién estaría la operación de su franquicia?</label>
      <input type='text' class="form-control" placeholder="A cargo de quién estaría la operación de su franquicia?" name="cargoquien"> 
         </div>


   <div class="form-group">
                    <label>  A cuánto asciende el monto de lo que Usted desea invertir? </label>
       <select  class="form-control select2" name="inversion" required>
        <option value="Menos de $500,000.00">Menos de $500,000.00</option>
        <option value="De $5000,000.00 a $1,000,000.00">De $5000,000.00 a $1,000,000.00</option>
        <option value="Arriba de $1,000,000.00">Arriba de $1,000,000.00</option>
     
      </select>
     </div>
-->
 <div class="form-group">
                    <label>Comentarios</label>

           <textarea name="comentarios" placeholder=" Comentarios" rows="4" cols="50"></textarea>
         </div>


          <div class="form-group">
                    <label> Antendido por: </label>
       <select class="form-control select2" name="atendidopor" required>
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
                   <input type='text' class="form-control" placeholder=" Fecha de próximo contacto" name="fechaprimercontacto" required> 
              </div>
           </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        {!! Form::submit( 'Crear', ['class'=>'btn btn-success']) !!}
      </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.scripts')


<script>
$(function () {
  $("#cita-add-form").validate({
    
  });
});
</script>

