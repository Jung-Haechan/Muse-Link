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


<body>
<div id="app">
    @include('layouts.nav')

    <div class="content pb-5" style="background-image: url({{asset('storage/background/night.jpg')}}); background-size: cover;">
        <div class="jumbotron text-center"
             style="background-image: url({{asset('storage/skin/edm2.jpg')}}); background-size: cover; padding-top: 9.5rem;">
            @include('layouts.jumbotron')
        </div>

        @yield('content')

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">로그인</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <a class="btn btn-danger" href="{{ route('login.social', 'google') }}">
                                    구글 아이디로 로그인
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</div>


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/muselink.js')}}"></script>

</body>


</html>
