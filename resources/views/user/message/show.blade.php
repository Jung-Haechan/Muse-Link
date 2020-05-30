<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MuseLink</title>

    <script>
        window.onpageshow = function (event) {
            if (!(event.persisted || (window.performance && window.performance.navigation.type === 2))) {
                var msg = '{{Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if (exist) {
                    alert(msg);
                }
            }
        }
    </script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/dist/css/muselink.css')}}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <style>
        @yield('css')
    </style>

</head>


<body onresize="parent.resizeTo(423,600)" onload="parent.resizeTo(423,600)" style="background-color:#ffffff;">
<div id="app" style="background-color: #aaaaaa;">
    <message
        refresh-icon-dir="{{ getFile('storage/icon/refresh.png') }}"
        :opponent="{{ $opponent }}"
        :messages="{{ $messages }}"
    ></message>
</div>


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/muselink.js')}}"></script>

</body>


</html>
