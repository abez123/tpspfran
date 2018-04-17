@include('layouts.partials.htmlheader')
<style>
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
@media screen and (max-width: 767px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;       
  }
  </style>
<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Crear una Cita</h2>
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
 
  <div class="box-body">
    <div class="row">

      <div class="col-md-8 col-md-offset-2">
        <h3><a href="{{url('user_profile')}}">Regresar</a></h3>
         @if(\Entrust::hasRole('GERENTE_TIENDA'))
        <div class="classesCallendar">
        <div id='calendar'></div>

      </div>
      @endif
        
        @la_access("Citas", "create")

      {!! Form::open(['action' => 'CitasController@store', 'id' => 'cita-add-form']) !!}
      <div class="modal-body">
        <div class="box-body">
                   
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
              @la_input($module, 'fechaservicio')

                     <div class="form-group ">
                   <label class="control-label" for="hora"> <i class="glyphicon glyphicon-user"></i>  Horario</label>
                      <select style="width: 100%" name="hora" id="hora" class="form-control" rel="select2">
                       
                        
                  


                      </select>                                    
                   
                 
          
        </div>
        
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
       <iframe width="800px" height="500px"  src="http://todoparasuspies.com/mx/productos-todos"></iframe>
   
     </div>
   </div>
 
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Regresar</button>
        <span class="pull-right">
  {!! Form::submit( 'Confirmado', ['class'=>'btn btn-success']) !!}
        
          </button>
        </span>
      </div>
            {!! Form::close() !!}
</div>
</div>
</div>
@endla_access








       

</div>
</div>
</div>
   <br>
<br>
<br>
</div>


       
</div>
</div>

</div>
<!-- end #main-wrapper -->


@include('layouts.partials.scripts')

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
          url: '{{url('/calendariofran-ajax')}}',
          color: 'blue',    // an option!
            textColor: 'white'  // an option!
          
          },
            {
          url: '{{url('/comidainiciafran-ajax')}}',
          color: 'red',    // an option!
            textColor: 'black'
       
          
          },
           {
          url: '{{url('/comidaterminafran-ajax')}}',
          color: 'red',    // an option!
            textColor: 'black'  // an option!
          
          },
     
   
      

]
        });
       
  
           
           
      });


    </script>
<script>



         
$(function () {
  $("#cita-add-form").validate({
    
  });
});
 $('#cliente_id').change(function(){
        if ($(this).val() == '0'){
           $('#newclient').show() &&  $('#newclientII').show();
        }
       
        else{


             $('#newclient').hide() &&  $('#newclientII').hide();
           }
    });
  @if(\Entrust::hasRole('GERENTE_TIENDA'))
 $('#servicio_id').on('change', function(e){
    var cat_id = e.target.value; 
    @foreach($sucursales as $item)
var sucursal_id ={{$item->id}};
@endforeach
  

               
               $('#pedicurista_id').empty();
    
    var cat_id = $('#servicio_id').val();
       $.get('{{url('/pedicuristafran-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id, function(data){

           //success data
              


           
               $('#pedicurista_id').empty();
                      $('#pedicurista_id').append('<option value ="000">Cualquiera</option');

           $.each(data, function(index, subcatObj){
        
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + '</option');
                 

      
            

       });

});
       

       //ajax



       $.get('{{url('/pedicuristafran-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id, function(data){

           //success data
              
$('#pedicurista_id').empty();
                      $('#pedicurista_id').append('<option value ="000">Cualquiera</option');

           
          
                     

           $.each(data, function(index, subcatObj){
        
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + '</option');
                 

      
             

       });

});
   });
   @else
    $('#servicio_id').on('change', function(e){
    var cat_id = e.target.value; 
    var sucursal_id = $('#sucursal_id').val();
 


 
 $( "#sucursal_id" ).on('change', function(e){
               
               $('#pedicurista_id').empty();
      var sucursal_id = e.target.value; 
    var cat_id = $('#servicio_id').val();
       $.get('{{url('/pedicuristafran-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id, function(data){

           //success data
              


           
               $('#pedicurista_id').empty();
                     

           $.each(data, function(index, subcatObj){
        
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + '</option');
                 

      
            

       });

});
           });

       //ajax



       $.get('{{url('/pedicuristafran-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id, function(data){

           //success data
              
$('#pedicurista_id').empty();
                 

           
          
                     

           $.each(data, function(index, subcatObj){
        
               $('#pedicurista_id').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompletoped  + '</option');
                 

      
             

       });

});
   });
    @endif
  @if(\Entrust::hasRole('GERENTE_TIENDA'))
 $('.input-group.date').on('dp.hide', function(e){
 
    var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
        @foreach($sucursales as $item)
var sucursal_id ={{$item->id}};
@endforeach
    
    // var timedisable=["10:00:00","12:00:00"]

 
   var newfecha = newfecha1.split("/").reverse().join("-");
       //ajax 
$( "#pedicurista_id" ).on('change', function(e){
   var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
     var sucursal_id = $('#sucursal_id').val();
      var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horariofran-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

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
$.get('{{url('/horariofran-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

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
 $('.input-group.date').on('dp.hide', function(e){
 
    var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
     var sucursal_id = $('#sucursal_id').val();
    
    // var timedisable=["10:00:00","12:00:00"]

 
   var newfecha = newfecha1.split("/").reverse().join("-");
       //ajax 
$( "#pedicurista_id" ).on('change', function(e){
   var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
     var sucursal_id = $('#sucursal_id').val();
      var newfecha = newfecha1.split("/").reverse().join("-");
       $.get('{{url('/horariofran-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

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
$.get('{{url('/horariofran-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id+ '&sucursal_id=' + sucursal_id, function(data){

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

       $.get('{{url('/clientefran-ajax')}}?cliente_id=' +cliente_id, function(data){

           //success data
           $('#clientehistory').empty();

           $('#clientehistory').append('<div class="box-body table-condensed table-responsive"><table id="example1" class="table table-bordered table-condensed table-responsive"><thead><tr class="success"><th>id</th><th>Cliente</th><th>Sucursal</th><th>Servicio</th><th>Pedicurista</th><th>Fecha</th><th>Hora</th><th>Estaus</th></tr></thead></table></div>');
            
           $.each(data, function(index, subcatObj){
                if(data && data !=""){
$('#clientehistory').append('<div class="box-body table-responsive"><table id="example1" class="table table-bordered table-condensed table-responsive"><tr><td>'+ subcatObj.id+ '</td><td>'+ subcatObj.nombrecompleto+ '</td><td>'+ subcatObj.nombresuc+ '</td><td>'+ subcatObj.nombreservicio+ '</td><td>'+ subcatObj.nombrecompletoped+ '</td><td>'+ subcatObj.fechaservicio+ '</td><td>'+ subcatObj.hora+ '</td><td>'+ subcatObj.estatus+ '</td></tr></tbody></table></div>');
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
       $.get('{{url('/citaconfirmfran-ajax')}}?cliente_id=0&servicio_id='+servicio_id+'&pedicurista_id='+pedicurista_id, function(data){

         $.each(data, function(index, subcatObj){
    
    
$('#favoritesModalLabel').append(subcatObj.nombrecompletoped);
$('#favoritesModalfecha').text(newfecha1);
$('#fav-sucursal').text(subcatObj.nombresuc);
$('#fav-hora').text(hora);
$('#fav-servicio').text(subcatObj.nombreservicio);
$('#fav-precio').text(subcatObj.precio);
$('#fav-cliente').text(cliente_id);
           });
      });
     }else if(clienteids >= 1){
   $.get('{{url('/citaconfirmfran-ajax')}}?cliente_id='+cliente_id+'&servicio_id='+servicio_id+'&pedicurista_id='+pedicurista_id, function(data){

         $.each(data, function(index, subcatObj){
    
    
$('#favoritesModalLabel').append(subcatObj.nombrecompletoped);
$('#favoritesModalfecha').text(newfecha1);
$('#fav-sucursal').text(subcatObj.nombresuc);
$('#fav-hora').text(hora);
$('#fav-servicio').text(subcatObj.nombreservicio);
$('#fav-precio').text(subcatObj.precio);
$('#fav-cliente').text(subcatObj.nombrecompleto);

$( "#imageped" ).attr( "src", subcatObj.imagen);
           });
      });

     }
 });


</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a98554cd7591465c7082a92/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript">
Tawk_API = Tawk_API || {};
Tawk_API.visitor = {
 
    name  : '{{$name}}',
    email : '{{$email}}'
  
};
</script>
</body>


</html>
