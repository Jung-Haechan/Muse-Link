@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <form action="{{ route('music.store') }}" method="post">
        <input type="text" name="title" placeholder="제목">
        <input type="text" name="genre" placeholder="장르">
        <input type="file" name="audio_file">
        <input type="text" name="youtube_url" placeholder="유튜브 url">
        <input type="file" name="cover_img_file">
        <textarea name="description" id="" cols="30" rows="10" placeholder="노래 설명"></textarea>
        <input type="text" name="composer" placeholder="작곡가">
        <input type="text" name="editor" placeholder="편곡자">
        <input type="text" name="lyricist" placeholder="작사가">
        <input type="text" name="singer" placeholder="보컬">
    </form>

@endsection
