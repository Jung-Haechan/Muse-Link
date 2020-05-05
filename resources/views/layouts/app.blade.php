<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MuseLink</title>

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

    </style>

</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark py-lg-3 fixed-top" style="background:#2b170f;" id="mainNav">
    <a class="navbar-brand" style="color: #d2ab39;" href="http://127.0.0.1:8000/">MuseLink</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    게시판
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('music.index', 'collaboration') }}">협업 게시판</a>
                    <a class="dropdown-item" href="#">완성작 게시판</a>
                    <a class="dropdown-item" href="#">자유 게시판</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    커뮤니티
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">프로듀서 검색</a>
                    <a class="dropdown-item" href="#">보컬 검색</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MuseLink 차트
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">지금 핫한 노래</a>
                    <a class="dropdown-item" href="#">주간 TOP100</a>
                    <a class="dropdown-item" href="#">월간 TOP100</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    음악 강좌
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">프로듀싱 강좌</a>
                    <a class="dropdown-item" href="#">보컬 강좌</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    기타
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">공지사항</a>
                    <a class="dropdown-item" href="#">QnA</a>
                    <a class="dropdown-item" href="#">후원문의</a>
                </div>
            </li>
        </ul>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="row">
                                <img src="{{Auth::user()->profile_img}}" style="width: 40px">
                                <h5 class="mt-2 mx-2"><a class="text-decoration-none text-light"
                                                         href="{{ route('register') }}">{{Auth::user()->name}}님</a></h5>
                                <button type="submit" class="btn btn-outline-light mr-3">Logout</button>
                            </div>
                        </form>
                    @else
                        <button type="button" class="btn btn-outline-light" data-toggle="modal"
                                data-target="#exampleModal">Login</button>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

<div class="content" style="background-image: url({{asset('storage/background/night.jpg')}}); background-size: cover;">
    <div class="jumbotron text-center"
         style="background-image: url({{asset('storage/skin/edm2.jpg')}}); background-size: cover; padding-top: 9.5rem;">

        @yield('jumbotron')
    </div>

    @yield('content')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/muselink.js')}}"></script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">로그인</h5>
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
<footer class="page-footer font-small blue" style="background:#2b170f;">

    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>

</footer>
</body>


</html>
