<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ LAConfigs::getByKey('site_description') }}">
<meta name="author" content="Linguas IT Solutions">

<meta property="og:title" content="{{ LAConfigs::getByKey('sitename') }}" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{ LAConfigs::getByKey('site_description') }}" />
    
<meta property="og:url" content="http://franquiciatario.todoparasuspies.com" />
<meta property="og:sitename" content="franquiciatario.todoparasuspies.com" />
<meta property="og:image" content="http://todoparasuspies.com/favicon.ico" />
    
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@todoparasuspies" />
<meta name="twitter:creator" content="@todoparasuspies" />
    
<title>{{ LAConfigs::getByKey('sitename') }}</title>

<!-- Fonts Online -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="http://todoparasuspies.com/favicon.ico">
<!-- Style Sheet -->
<link rel="stylesheet" href="{{ asset('socio-assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('socio-assets/css/main-style.css') }}">
<link rel="stylesheet" href="{{ asset('socio-assets/css/style.css') }}">

    <!-- iCheck -->
    <link href="{{ asset('la-assets/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

     <!-- full-calendar -->
    <link href="{{ asset('la-assets/plugins/fullcalendar-3.8.2/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  
        <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css"/>
<link rel="stylesheet"
          href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css" type="text/css"/>
<!-- ionicons.css-->

    <link href="{{ asset('la-assets/css/ionicons.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('la-assets/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
       <link href="{{ asset('la-assets/fonts/ionicons.eot') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('la-assets/fonts/ionicons.svg') }}" rel="stylesheet" type="text/css" />
           <link href="{{ asset('la-assets/fonts/ionicons.ttf') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('la-assets/fonts/ionicons.woff') }}" rel="stylesheet" type="text/css" />
          
    @stack('styles')
</head>

