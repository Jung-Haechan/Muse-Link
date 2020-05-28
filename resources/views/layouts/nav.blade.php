<nav class="navbar navbar-expand-lg navbar-dark py-lg-3 fixed-top" style="background:#2b170f;" id="mainNav">
    <a class="navbar-brand" style="color: #d2ab39;" href="{{ route('index') }}">MuseLink</a>
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
                    <a class="dropdown-item" href="{{ route('project.index', 'collaboration') }}">협업 게시판</a>
                    <a class="dropdown-item" href="{{ route('project.index', 'completed') }}">완성작 게시판</a>
                    <a class="dropdown-item" href="{{ route('post.index') }}">자유 게시판</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    커뮤니티
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.index', 'producer') }}">프로듀서 검색</a>
                    <a class="dropdown-item" href="{{ route('user.index', 'singer') }}">보컬 검색</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MuseLink 차트
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">지금 핫한 노래</a>
                    <a class="dropdown-item" href="{{ route('project.index', ['chart', 'period' => 'week']) }}">주간 TOP12</a>
                    <a class="dropdown-item" href="{{ route('project.index', ['chart', 'period' => 'month']) }}">월간 TOP12</a>
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
                            <div class="container">
                                <div class="row">
                                    <img src="{{Auth::user()->profile_img}}" style="width: 1.5rem" class="my-auto">
                                    <h5 class=" mx-2 my-auto dropdown">
                                        <a class="text-decoration-none text-light dropdown-toggle" href="#" data-toggle="dropdown">{{Auth::user()->name}}님</a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('register') }}" class="dropdown-item">내정보 수정</a>
                                            <a href="{{ route('user.show', ['producer', Auth::id()]) }}" class="dropdown-item">내 채널</a>
                                        </div>
                                    </h5>
                                    <button type="submit" class="btn btn-outline-light mr-3">Logout</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <button type="button" class="btn btn-outline-light" data-toggle="modal"
                                data-target="#loginModal">Login
                        </button>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
