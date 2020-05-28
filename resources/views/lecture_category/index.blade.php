@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">강좌를 통해 실력을 향상시키세요!</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="{{ route('lecture_category.index') }}"
           class="text-light text-decoration-none">Lecture</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            <div class="text-center">
                준비중입니다.
            </div>
        </div>
    </div>


@endsection
