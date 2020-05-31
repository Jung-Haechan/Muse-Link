@extends('layouts.app')

@section('jumbotron.page', 'Login')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="btn" href="{{ route('login.social', 'google') }}">
                    <img src="{{ getFile('storage/icon/google-login.png') }}" style="width: 15rem;" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
