
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laravel Blog @yield('title') </title>
    <!-- CHANGE THIS TITLE FOR EACH PAGE -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->

    <link type="text/css" rel="stylesheet" href="{{ url('/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ url('/css/app.css') }}" />



@yield('stylesheets')



</head>
