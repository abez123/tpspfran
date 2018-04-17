@extends("la.layouts.app")

@section("contentheader_title")
  <a href="{{ url(config('laraadmin.adminRoute') . '/createcita') }}">Cita</a> :
@endsection
@section("contentheader_description", "Crear Cita")
@section("section", "Citas")
@section("section_url", url(config('laraadmin.adminRoute') . '/createcita'))
@section("sub_section", "Crear")



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
  
  <div class="box-body">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
         @if(\Entrust::hasRole('GERENTE_TIENDA'))
        <div class="classesCallendar">
        <div id='calendar'></div>

      </div>
      @endif
        
        @la_access("Citas", "create")

      {!! Form::open(['action' => 'LA\CitasController@store', 'id' => 'cita-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">

                    <label class="control-label"  for="cliente_id"> <i class="glyphicon glyphicon-user"></i> Cliente *:</label> <select
              style="width: 100%" rel="select2" name="cliente_id" id="cliente_id"
              class="form-control select2"> 
              <option value=""></option>
                          <option value="0">Nuevo Cliente</option>
              @foreach($clientes as $item)
              <option value="{{$item->id}}"
                @if(!empty($clientes))
                                        @if($item->id==$cliente)
                            selected="selected"
                        @endif
                @endif >{{$item->nombrecompleto}} | Celular: {{$item->celular}} | Tel casa: {{$item->telcasa}} | {{$item->correo}}</option>
              @endforeach
            </select>
          <div class="box box-success" id="clientehistory">
  <!--<div class="box-header"></div>-->
  
</div>

      <div style="display: none" class="modal-header" id="newclient">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> <i class="glyphicon glyphicon-user"></i>  Nuevo Cliente</h4>
      </div>
      
      <div style="display: none" class="modal-body" id="newclientII">
        <div class="box-body">
                   
          <div class="form-group">
            <label>Nombre Completo: <input class="form-control" type="text" name="nombrecompleto" value="" id="nombrecompleto"></label>
          </div>
          <div class="form-group">
          <label>Telefono de Casa: <input class="form-control" type="tel" name="telcasa" value="" id="telcasa"></label>
          </div>
          <div class="form-group">
          <label>Celular: <input class="form-control" type="tel" name="celular" value="" id="celular"></label>
          </div>
          <div class="form-group">
          <label>Correo: <input class="form-control" type="email" name="correo" value="" id="correo"></label>
        </div>

          
          
        </div>
      </div>
      
                @if(\Entrust::hasRole('GERENTE_TIENDA'))
     
@foreach($sucursales as $item)
<h3>Sucursal: {{$item->nombresuc}}</h3>
<input type="hidden" name="sucursal_id" value="{{$item->id}}">
@endforeach
                          @else
                            <label class="control-label"  for="sucursal_id"><i class="glyphicon glyphicon-home"></i>  Sucursal *:</label>  
                           <select
              style="width: 100%" rel="select2" name="sucursal_id" id="sucursal_id"
              class="form-control select2"> 
              <option value=""></option>

              @foreach($sucursales as $item)
              <option value="{{$item->id}}"
                @if(!empty($sucursales))
                                        @if($item->id==$sucursal)
                            selected="selected"
                        @endif
                @endif >{{$item->nombresuc}}</option>
              @endforeach
            </select>
                          @endif

          <br>
   
              @la_input($module, 'fechaservicio')
                        
          
            
            <label class="control-label"  for="servicio_id"><i class="glyphicon glyphicon-heart"></i> Servicio *:</label> <select
              style="width: 100%" rel="select2" name="servicio_id" id="servicio_id"
              class="form-control select2"> 
              <option value=""></option>
                         
              @foreach($servicios as $item)
              <option value="{{$item->id}}"
                @if(!empty($servicios))
                                        @if($item->id==$servicio)
                            selected="selected"
                        @endif
                @endif >{{$item->nombreservicio}}</option>
              @endforeach
            </select>
            
          
              <br>
  

            
      
            
           <label class="control-label" for="pedicurista_id"> <i class="glyphicon glyphicon-user"></i>  Pedicurista</label>
                      <select style="width: 100%" name="pedicurista_id" id="pedicurista_id" class="form-control" rel="select2">
                       
                        
                      <option value=""></option>


                      </select>                                    
           
                <br>

                     <div class="form-group ">
                   <label class="control-label" for="hora"> <i class="glyphicon glyphicon-user"></i>  Horario</label>
                      <select style="width: 100%" name="hora" id="hora" class="form-control" rel="select2">
                       
                        
                  


                      </select>                                    
                   
                 
          
        </div>
        
    
      <br>
        @la_input($module, 'estatus')
        @la_input($module, 'cortesia')
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset"  class="btn btn-default"  >Limpiar</button>
        <button type="button"  class="btn btn-primary btn-lg"  data-toggle="modal" 
   data-target="#favoritesModal" id="confirmbtn">Confirmar</button>


    </div>
 
      </div>

 <div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
     
          <h3><strong>Pedicurista:</strong></h3>
  
        <h3 class="modal-title" 
        id="favoritesModalLabel"></h3>
              <img width="200px" id="imageped" src="" alt="">
      </div>

      <div class="modal-body">
         <h3 style="display:inline" ><strong>Sucursal:</strong> <span id="fav-sucursal"></span></h3> &nbsp; &nbsp;
      
       <h3  style="display:inline"><strong>Fecha:</strong> <span id="favoritesModalfecha"></span></h3> &nbsp;
         <br>
        <h3  style="display:inline"><strong>Hora:</strong>  <span id="fav-hora"></span></h3>&nbsp;
        
        <h3  style="display:inline"><strong>Servicio:</strong>  <span id="fav-servicio"></span></h3>&nbsp;
     <br>
        <h3  style="display:inline"><strong>Precio:</strong> <span id="fav-precio"></span></h3>&nbsp;
        <br>
       <h3  style="display:inline"><strong>Cliente:</strong> <span id="fav-cliente"></span></h3>&nbsp;
      
      
       <div class="form-group"><label for="pedido">¿Desea algun producto? :</label> {{ Form::checkbox('pedido', 0, null, ['id' => 'pedido','class' => 'field']) }}</div>
        <div style="display: none" class="form-group" id="autoUpdate" >
       <iframe width="550px" height="500px"  src="http://todoparasuspies.com/mx/productos-todos"></iframe>
   
     </div>
   </div>
 
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Regresar</button>

        <span class="pull-right" id="confirmyes">
  
        {!! Form::submit( 'Confirmado', ['class'=>'btn btn-success']) !!}
 
        </span>
      </div>
            {!! Form::close() !!}
</div>
</div>
</div>
@endla_access


@endsection

@push('scripts')


  <script type="text/javascript">
  
   
    $('#pedido').change(function(){
        if(this.checked)
           $('#autoUpdate').show();
       
        else
             $('#autoUpdate').hide();

    });

    var oTable;
      $(document).ready(function() {

        
       $('#calendar').fullCalendar({
eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="width:250px;height:200px;background:#437D92;color:#ffffff;position:absolute;z-index:10001;">' + ' Pedicurista:'+'<br>' + calEvent.title + '<br>'+ 'Servicio:' +'<br>' + calEvent.nombreservicio +'<br>' +  'Cliente:' +'<br>' + calEvent.description +'</div>';
    $("body").append(tooltip);
    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $('.tooltipevent').fadeIn('500');
        $('.tooltipevent').fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $('.tooltipevent').css('top', e.pageY + 10);
        $('.tooltipevent').css('left', e.pageX + 20);
    });
},

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},
          header: {
           left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listDay'
          },
        views: {
        listDay: {
          buttonText: 'Lista día'
        },
      
    },
          lang: 'es',
          axisFormat: 'HH:mm',
          minTime: '10:00:00',
          maxTime: '21:00:00',
          defaultView: 'agendaDay',
          defaultDate: '{{date('Y-m-d')}}',
          firstDay: 1,
          slotDuration: '0:30:00',
          columnFormat: 'ddd D',
          allDaySlot: false,
          editable: false, // Чи можна перетягувати
          eventLimit: true,


            // allow "more" link when too many events
          eventSources: [

          {
          url: '{{url('/calendario-ajax')}}',
          color: 'blue',    // an option!
            textColor: 'white'  // an option!
          
          },
            {
          url: '{{url('/comidainicia-ajax')}}',
          color: 'red',    // an option!
            textColor: 'black'
       
          
          },
           {
          url: '{{url('/comidatermina-ajax')}}',
          color: 'red',    // an option!
            textColor: 'black'  // an option!
          
          },
     
   
      

]
        });
       
  
           
           
      });


    </script>


    <script type="text/javascript">
      //Obtener la sucursal para ver el dia que no abren.Por lo pronto programado para el domingo
      
    @if(\Entrust::hasRole('GERENTE_TIENDA'))
   // $( window ).load(function() {
  
  $( "#fechaservicio" ).click(function(){
    
        @foreach($sucursales as $item)
        var sucursal_id ={{$item->id}};
        @endforeach
    @else
     $('#sucursal_id').change(function(e){
  
     var sucursal_id = e.target.value; 
     
    @endif

    
  $.get('{{url('/sucursal-ajax')}}?sucursal_id=' + sucursal_id, function(data){
 $.each(data, function(index, subcatObj){
if(subcatObj.domingo == 0){
   $('#fechaservicio').datetimepicker({
     daysOfWeekDisabled: [0],
     format: 'DD/MM/YYYY',
     enabledHours: false,
     viewMode: 'days',
     useCurrent: true
    
  
 });

 $('#fechaservicio').data("DateTimePicker").hide();
 $('#fechaservicio').data("DateTimePicker").show();

        }//Si abre el domingo
        else{
          $('#fechaservicio').datetimepicker({
    
     format: 'DD/MM/YYYY',
     enabledHours: false,
     viewMode: 'days',
     useCurrent: true
    
  
 });

 $('#fechaservicio').data("DateTimePicker").show();
        }
     })
})
   
 });



//Validar formulario

         
$(function () {
  $("#cita-add-form").validate({
    
  });
});







//Anadir cliente nuevo si seleccionan Nuevo CLiente
 $('#cliente_id').change(function(){
        if ($(this).val() == '0'){
           $('#newclient').show() &&  $('#newclientII').show();
        }
       
        else{


             $('#newclient').hide() &&  $('#newclientII').hide();
           }
    });














//La sucursal de la gerente de tienda

  @if(\Entrust::hasRole('GERENTE_TIENDA'))
 $('#servicio_id').on('change', function(e){
    var cat_id = e.target.value; 
    @foreach($sucursales as $item)
var sucursal_id ={{$item->id}};
@endforeach
  

               
               $('#pedicurista_id').empty();
    
    var cat_id = $('#servicio_id').val();
     var newfecha1 = $('#fechaservicio').val(); 
      var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id+'&fechaservicio=' +  newfecha , function(data){

           //success data
              


           
               $('#pedicurista_id').empty();


           $.each(data, function(index, subcatObj){
        
              if(subcatObj.citas_count){
             
              $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (' + subcatObj.citas_count  + ') '+ '</option');
            }else{
            
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (0) '+ '</option');

            }
                 

      
            

       });

});
       

       //ajax



  var newfecha1 = $('#fechaservicio').val(); 
      var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id+'&fechaservicio=' +  newfecha, function(data){

           //success data
              
$('#pedicurista_id').empty();
                

           
   

           $.each(data, function(index, subcatObj){
        
                if(subcatObj.citas_count){
            
              $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (' + subcatObj.citas_count  + ') '+ '</option');
            }else{
           
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (0) '+ '</option');

            }
                 

      
             

       });

});
   });//La sucursales para call center, Super admins
   @else
    $('#servicio_id').on('change', function(e){
    var cat_id = e.target.value; 
    var sucursal_id = $('#sucursal_id').val();
 
 var newfecha1 = $('#fechaservicio').val(); 
      var newfecha = newfecha1.split("/").reverse().join("-");

 //Si cambia la cucursal debe de cambiar las pedicuristas
 $( "#sucursal_id" ).on('change', function(e){
               
             
      var sucursal_id = e.target.value; 
    var cat_id = $('#servicio_id').val();
    var newfecha1 = $('#fechaservicio').val(); 
      var newfecha = newfecha1.split("/").reverse().join("-"); 


       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id+'&fechaservicio=' +  newfecha, function(data){

           //success data
              


           
               $('#pedicurista_id').empty();
               
 

           $.each(data, function(index, subcatObj){
        
               if(subcatObj.citas_count){
             
              $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (' + subcatObj.citas_count  + ') '+ '</option');
            }else{
              
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (0) '+ '</option');

            }

      
            

       });

});
           });

   //Si cambia la cucursal debe de cambiar las pedicuristas
 $( "#pedicurista_id" ).on('change', function(e){
               
              
      var sucursal_id = e.target.value; 
    var cat_id = $('#servicio_id').val();
    var newfecha1 = $('#fechaservicio').val(); 
      var newfecha = newfecha1.split("/").reverse().join("-"); 

      
       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id+'&fechaservicio=' +  newfecha, function(data){

           //success data
              


           
           
               
     

           $.each(data, function(index, subcatObj){
        
               if(subcatObj.citas_count){
          
              $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (' + subcatObj.citas_count  + ') '+ '</option');
            }else{
              
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (0) '+ '</option');

            }

      
            

       });

});
           });




       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id+'&fechaservicio=' +  newfecha, function(data){

           //success data
              
$('#pedicurista_id').empty();
                    
         $('#pedicurista_id').append('<option value ="000">Seleccione Una Pedicurista</option');

           $.each(data, function(index, subcatObj){
            if(subcatObj.citas_count){
       

              $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (' + subcatObj.citas_count  + ') '+ '</option');
            }else{
      
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + ' (0) '+ '</option');

            }
               
                 

      
             

       });

});
   });
    @endif





    //Si es gerente de tienda obtener su sucursal
        @if(\Entrust::hasRole('GERENTE_TIENDA'))
    $( "#pedicurista_id" ).on('change', function(e){
 
    var pedicurista_id  =  $('#pedicurista_id').val();
    var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
        @foreach($sucursales as $item)
     var sucursal_id ={{$item->id}};
        @endforeach
    
    // var timedisable=["10:00:00","12:00:00"]

 
   var newfecha = newfecha1.split("/").reverse().join("-");
       //ajax 
       $('.input-group.date').on('dp.hide', function(e){

   var pedicurista_id  =  $('#pedicurista_id').val();
   var newfecha1=  $('#fechaservicio').val(); 
   var servicio_id = $('#servicio_id').val();
   var sucursal_id = $('#sucursal_id').val();
   var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
         

       });
 });
       //Service Change
               $( "#servicio_id" ).on('change', function(e){

   var pedicurista_id  =  $('#pedicurista_id').val();
   var newfecha1=  $('#fechaservicio').val(); 
   var servicio_id = $('#servicio_id').val();
   var sucursal_id = $('#sucursal_id').val();
   var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
         

       });
 });
$.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
            

       });
   });


@else
$( "#pedicurista_id" ).on('change', function(e){
 
 
    var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
     var sucursal_id = $('#sucursal_id').val();
    
    // var timedisable=["10:00:00","12:00:00"]

 
   var newfecha = newfecha1.split("/").reverse().join("-");
  //Fecha Change
$('.input-group.date').on('dp.hide', function(e){
   var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
     var sucursal_id = $('#sucursal_id').val();
      var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
         

       });
 });

//Service Change
  $( "#servicio_id" ).on('change', function(e){

   var pedicurista_id  =  $('#pedicurista_id').val();
   var newfecha1=  $('#fechaservicio').val(); 
   var servicio_id = $('#servicio_id').val();
   var sucursal_id = $('#sucursal_id').val();
   var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
         

       });
 });


$.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
        
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
          

       });
   });
 @endif










$('#cliente_id').on('change', function(e){
 
    var cliente_id  = e.target.value; 
 
    
  
       //ajax 

       $.get('{{url('/cliente-ajax')}}?cliente_id=' +cliente_id, function(data){

           //success data
           $('#clientehistory').empty();

           $('#clientehistory').append('<div class="box-body"><table id="example1" class="table table-bordered"><thead><tr class="success"><th>id</th><th>Cliente</th><th>Sucursal</th><th>Servicio</th><th>Pedicurista</th><th>Fecha</th><th>Hora</th><th>Estaus</th></tr></thead></table></div>');
            
           $.each(data, function(index, subcatObj){
                if(data && data !=""){
$('#clientehistory').append('<div class="box-body"><table id="example1" class="table table-bordered"><tr><td>'+ subcatObj.id+ '</td><td>'+ subcatObj.nombrecompleto+ '</td><td>'+ subcatObj.nombresuc+ '</td><td>'+ subcatObj.nombreservicio+ '</td><td>'+ subcatObj.nombrecompletoped+ '</td><td>'+ subcatObj.fechaservicio+ '</td><td>'+ subcatObj.hora+ '</td><td>'+ subcatObj.estatus+ '</td></tr></tbody></table></div>');
               }else{
 $('#clientehistory').append('Sin Historial');
                
              }
             
        //for (index = 0; index < timedisable.length; ++index) {
              // $("#hora option[value='"+timedisable[index]+"']").remove();
        //}
           });
     
            

       });


   });



  $( "#confirmbtn" ).on('click', function(e){

     


    
     var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
     var newfecha = newfecha1.split("/").reverse().join("-");
     var servicio_id= $('#servicio_id').val(); 

     var hora = $('#hora').val();

     var clienteids = $('#cliente_id').val();
    if (clienteids<1){
var cliente_id = $('#nombrecompleto').val();
    }else{
var cliente_id = $('#cliente_id').val();
    }
     var precio = $('#precio').val();

 if (clienteids<1){
       $.get('{{url('/citaconfirm-ajax')}}?cliente_id=0&servicio_id='+servicio_id+'&pedicurista_id='+pedicurista_id+'&fechaservicio='+newfecha+'&hora='+hora, function(data){

         $.each(data, function(index, subcatObj){
    
if(subcatObj.citas!=[]){  
$('#favoritesModalLabel').append(subcatObj.nombrecompletoped);
$('#favoritesModalfecha').text(newfecha1);
$('#fav-sucursal').text(subcatObj.nombresuc);
$('#fav-hora').text(hora);
$('#fav-servicio').text(subcatObj.nombreservicio);
$('#fav-precio').text(subcatObj.precio);
$('#fav-cliente').text(cliente_id);
$( "#imageped" ).attr( "src", subcatObj.imagen);
}else{
  $('#favoritesModalLabel').text('Horario ya ocupado. Favor de regresar al cita para cambiar la hora o fecha.');
}

           });
      });
     }else if(clienteids >= 1){
   $.get('{{url('/citaconfirm-ajax')}}?cliente_id='+cliente_id+'&servicio_id='+servicio_id+'&pedicurista_id='+pedicurista_id+'&fechaservicio='+newfecha+'&hora='+hora, function(data){

         $.each(data, function(index, subcatObj){
  if(subcatObj.citas!=[]){  
    
$('#favoritesModalLabel').append(subcatObj.nombrecompletoped);
$('#favoritesModalfecha').text(newfecha1);
$('#fav-sucursal').text(subcatObj.nombresuc);
$('#fav-hora').text(hora);
$('#fav-servicio').text(subcatObj.nombreservicio);
$('#fav-precio').text(subcatObj.precio);
$('#fav-cliente').text(subcatObj.nombrecompleto);
$( "#imageped" ).attr( "src", subcatObj.imagen);
}else{
 $('#favoritesModalLabel').text('Horario ya ocupado. Favor de regresar al cita para cambiar la hora o fecha.');
}
           });
      });

     }
 });


</script>

@endpush
