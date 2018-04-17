@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Reportes</h2>
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
 <div class="profile-company-content user-profile main-user" data-bg-color="f5f5f5">
      <div class="container">
        <div class="row"> 
            <!-- Nav Tabs -->
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active"><a  href="{{url('/user_profile')}}">Perfil</a></li>
              <li><a  href="{{url('/user_profile#factura')}}">Facturas</a> </li>
               <li><a  href="{{url('/user_profile#reportes')}}">Reportes</a></li>
             
                  <li><a  href="{{url('/citasver')}}">Citas</a></li>
                  <li><a href="{{url('/noticias')}}">Noticias</a></li>
              
               <li><a  href="{{url('/user_profile#docus')}}">Documentos</a></li>
              <!--<li><a data-toggle="tab" href="#contacto">Contacto</a></li>-->
              <li><a href="{{url('/user_profile#tareas')}}">Tareas</a></li>         
              <li><a  href="{{url('/user_profile#enlaces')}}">Enlaces</a></li>    
              <li><a  href="{{url('/encuestas')}}">Encuestas</a></li>
             
            </ul>
          </div>
        </div>
        <div class="box box-success">

  <!--<div class="box-header"></div>-->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-responsive table-striped">

    <thead>
    <tr class="success">
      @foreach( $listing_cols as $col )
      <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
      @endforeach
      
    </tr>
    </thead>

    <tbody>
      
    </tbody>
      
    </table>
  </div>
</div>
<br>
 <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                          <canvas  id="myChart" ></canvas>
         
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
      <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                
                        
                        
                             <canvas   id="myChart2" ></canvas>
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
<br>
     <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                          <canvas  id="myChart3" ></canvas>
         
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
      <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                
                        
                        
                             <canvas  id="myChart4" ></canvas>
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
      </div>
    </div>

   <br>
</div>

<!-- end #main-wrapper -->

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Asignadas", "Confirmadas", "Pagadas", "Canceladas", "No Show"],
        datasets: [{
            label: '# de Citas',
            data: [{{$citasasigandas}}, {{$citasconfirmadas}}, {{$citaspagadas}}, {{$citascancladas}},{{$citasnoshows}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
              
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx2 = document.getElementById("myChart2");
var stackedLine = new Chart(ctx2, {
    type: 'line',
    data:  {"labels":
    ["Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"],
    "datasets":
    [{"label":"Ventas x mes en miles",
    "data":
    [110851.01,105314.00,128831.15,122071.86,125426.25,128360.45,116271.25,124387.31,122309.27,126976.35,117454.50,138025.69],
    "fill":true,
    "borderColor":"rgb(75, 192, 192)",
    "lineTension":0.1}]},
    "options":{}
  });

var ctx3 = document.getElementById("myChart3").getContext('2d');
var myPieChart = new Chart(ctx3,{
  "type":"doughnut",
  "data":
  {"labels":
  ["Pedicure","Manicure","Masaje","Gelish","Productos"],
  "datasets":
  [{"label":"Clientes",
  "data":[300000,500000,1000000,323344,75656],
  "backgroundColor":["rgb(255, 99, 132)",
  "rgb(54, 162, 235)",
  "rgb(255, 205, 86)",
  "rgb(72, 200, 137)",
  "rgb(54, 99, 144)"]}
  ]}
});
var randomScalingFactor = function() {
      return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    };

    var randomColorFactor = function() {
      return Math.round(Math.random() * 255);
    };
    var randomColor = function() {
      return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
    };
    var config = {
      type: 'line',
      data: {
        labels: ["Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"],
        datasets: [{
          label: 'Martha Calderon Sosa',
          fill: false,
          backgroundColor: "rgb(72, 200, 137)",
          borderColor: "rgb(72, 200, 137)",
          borderDash: [5, 5],
          data: [
            8034.60,4934.80,6164,3443,4743,6120,6820,9541,13564,7895,4568.10,5769
          ],
        }, {
          label: 'Gabriela Dominguez Sanchez',
          fill: false,
          backgroundColor: "rgb(255, 205, 86)",
          borderColor: "rgb(255, 205, 86)",
          borderDash: [5, 5],
          data: [
            71619.37,42462,58974.75,60385.50,56641.75,74524,50693.62,52776.50,52776.50,49903.50,46640.50,45053.45,49441.50
          ],
        }, {
          label: 'Elizabeth Robles Cardenas',
          fill: false,
          backgroundColor: "rgb(54, 162, 235)",
          borderColor: "rgb(54, 162, 235)",
          borderDash: [5, 5],
          data: [
            78168,75961.50,74246.50,67880,57046,71243,65509.62,64091,56438,48728,52236.80,56107.50
          ],
        },
        {
          label: 'Fidelina Reyes Farelo',
          backgroundColor: "rgb(255, 99, 132)",
          borderColor: "rgb(255, 99, 132)",
          borderDash: [5, 5],
          data: [
            0,0,0,0,0,0,0,0,54563.25,44780,48529.45,52588.50
          ],
          fill: false,
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Ventas por semestre'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Mes'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Pesos'
            }
          }]
        }
      }
    };
    window.onload = function() {
      var ctx4 = document.getElementById('myChart4').getContext('2d');
      window.myLine = new Chart(ctx4, config);
    };
  




  

</script>

<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>



<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script>
$(function () {
	$("#example1").DataTable({

		dom: 'Bfrtip',
		buttons: [
          
            'excelHtml5',{
              extend: 'print',
               message: 'Autopartes Legazpi',
               exportOptions: {
                    columns: ':visible'
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                    }
                },
            {
                extend: 'pdfHtml5',
                
                message: 'Todo para Sus Pies',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open', 
                exportOptions: { columns: ':visible' },
                 
            }
        
           
           
            
        ],
		processing: true,
        serverSide: true,
        ajax: "{{ url('/reporte_dt_ajax') }}",
		language: {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
		autoWidth: false,
		scrollY: true,
        scrollX: true,
        scrollCollapse: true,
     
  
	});


});
</script>

