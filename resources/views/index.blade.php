@extends('layouts.app')

@section('jumbotron')

    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">당신의 음악을 완성하세요!</h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="http://127.0.0.1:8000/" class="text-light text-decoration-none">MuseLink</a>
        </div>
    </h1>


@endsection

@section('content')


    <div class="container">
        <div class="col-md-9 p-5 mx-auto text-center"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

            <h2 style="">MuseLink에 오신 걸 환영합니다!</h2>
            <div class="mt-5" style="font-size: 1.2rem;">
                <p>MuseLink는 작곡가와 가수를 연결해주는 사이트입니다.</p>
                <p>저희 사이트는 무명 음악가들에게 그들만의 노래를 제작할 수 있는 최고의 기회를 제공합니다.</p>
                <p>당신이 작곡가라면, 곡 파일을 올려서 당신의 노래를 불러줄 사람을 찾아보세요.</p>
                <p>당신이 작사가라면, 작사 파일을 올려서 당신의 글을 노래로 만들어줄 사람을 찾아보세요.</p>
                <p>당신이 가수라면, 자신의 목소리를 올려서 당신에게 장신만의 노래를 만들어줄 사람을 찾아보세요.</p>
                <p class="font-weight-bold">협업을 통해 당신만의 노래를 제작해, 진정한 음악가로 데뷔해보세요!</p>
            </div>
            <div class="btn btn-lg btn-dark mt-5" onclick="location.href ='music/collaboration';">>
                협업하러 가기
            </div>
        </div>

    </div>


@endsection

