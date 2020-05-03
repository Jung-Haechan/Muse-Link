@extends('layouts.app')

@section('jumbotron')
    <h3 class="text-center">
        <div class="font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 작품을 공유하세요!</div>
    </h3>
    <h1 class="text-center text-light">
        <div class="display-1"><a href="http://127.0.0.1:8000/music/collaboration"
                                  class="text-light text-decoration-none">Collaboration</a></div>
    </h1>
    <a href="{{ route('music.create') }}" class="btn btn-outline-light mt-3">음악 만들기</a>
@endsection

@section('content')


    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 100px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <div class="row">
                <div class="col-sm-4">
                    <a class="text-decoration-none" href="#">
                        <div class="card container">
                            <div class="row text-dark bg-dark" style="height: 150px;">
                                <img class="card-img-top mb-3 col-7 mx-auto" src="{{asset('storage/edm2.jpg')}}"
                                     style=" height: 150px; object-fit: cover;" alt="Card image cap">
                            </div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">[발라드] 그리운 그대</h5>
                                <div class="card-text">
                                    by 구름이
                                </div>
                                <table class="table table-striped table-sm mt-3 text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">작곡</th>
                                        <th scope="col">편곡</th>
                                        <th scope="col">작사</th>
                                        <th scope="col">보컬</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>O</td>
                                        <td>X</td>
                                        <td>O</td>
                                        <td>O</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>

        </div>
    </div>


@endsection
