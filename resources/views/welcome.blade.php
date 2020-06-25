<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIClDYtmGFDRK5_Vnrimde_t5afT8HkCw&libraries=places"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Realty Finder</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="apple-touch-icon" href="icon.png">
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5JFCDWZ');</script>
<!-- End Google Tag Manager -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149611850-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149611850-1');
</script>


<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slicknav.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/base.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/set1.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/hover.css') }}">
    <!-- CSRF Token -->
 
    <script>
    
    (function () {
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
        @if(Auth::check())
            window.authUser={!! Auth::user() !!}
            @else
            window.authUser=false
            @endif
    })();
    </script>
</head>
<body>
<div id="app"> 
  
            <z-frontend></z-frontend>
           <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JFCDWZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --> 
    </div>
</body>
</html>