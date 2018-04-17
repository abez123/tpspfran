<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
<div  class="pull-left">
                            <a href="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg"><img
                                            src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg"></a>
                        </div>
  					<div class="container">
                        <div class="row">
                        <div class="col-md-6">
                        <div  class="center-block">
                        <h2 class="text-primary">Compromiso enviado por Todo Para Sus Pies</h2>

<h2>Nombre completo: {{ strip_tags($name) }}</h2>

<h3>Fecha del Compromiso: {{ $fechacompromiso }}</h3>

<h3>Compromiso: {{ preg_replace('/(<.*?>)|(&.*?;)/', '', $user_message) }}</h3>

<h3>Estatus: {{ $estatus }}</h3>




Puede ingresara la plataforma Todo Para Sus Pies  <a href="{{ url('/login') }}">{{ str_replace("http://", "", url('/login')) }}</a>.<br><br>

</div>
</div>
</div>
</div>
</body>
</html>