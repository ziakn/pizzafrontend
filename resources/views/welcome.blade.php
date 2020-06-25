
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link rel="icon" type="image/png" href="#">
        <!-- google fonts-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
        <title>Home | Pizza</title>
















        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            #se-pre-con {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999;
                    background: url(/Preloader_2.gif) center no-repeat #fff;
            }
        </style>
                
    </head>
    <body style="background-image:url(images/blackbg.jpg);">
        <div id="se-pre-con"></div>
        <div id="app"> 
            <z-frontend></z-frontend>
        </div>
        <script>
            window.addEventListener('load', function() {
                var s = document.getElementById('se-pre-con').style;
                s.opacity = 1;
                (function fade(){(s.opacity-=.1)<0?s.display="none":setTimeout(fade,40)})();
                    // $(".se-pre-con").fadeOut("slow");
                })
        
        </script>
    </body>
</html>
