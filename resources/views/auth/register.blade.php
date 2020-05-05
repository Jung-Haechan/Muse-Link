@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Profile') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="pb-2 text-center mt-4">
                                <img src="{{ $user->profile_img }}" style="width:100px">
                            </div>

                            <div class="form-group row mt-3 px-5">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group row mt-3 px-5">
                                <label for="introduce" class="col-form-label text-md-right">Introduce</label>

                                <textarea class="form-control" name="introduce" id="introduce"
                                          rows="8">{{$user->introduce}}</textarea>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                @error('introduce')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row pb-3 mt-3">
                                <div class="form-check col-3 text-center">
                                    <input class=form-check-input" type="checkbox" name="is_composer" id="is_composer"
                                           @if($user->is_composer) checked @endif>
                                    <label class="form-check-label" for="is_composer">
                                        작곡
                                    </label>
                                </div>
                                <div class="form-check col-3 text-center">
                                    <input class="form-check-input" type="checkbox" name="is_editor" id="is_editor"
                                           @if($user->is_editor) checked @endif>
                                    <label class="form-check-label" for="is_editor">
                                        편곡
                                    </label>
                                </div>
                                <div class="form-check col-3 text-center">
                                    <input class="form-check-input" type="checkbox" name="is_lyricist" id="is_lyricist"
                                           @if($user->is_lyricist) checked @endif>
                                    <label class="form-check-label" for="is_lyricist">
                                        작사
                                    </label>
                                </div>
                                <div class="form-check col-3 text-center">
                                    <input class="form-check-input" type="checkbox" name="is_singer" id="is_singer"
                                           @if($user->is_singer) checked @endif>
                                    <label class="form-check-label" for="is_singer">
                                        보컬
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-2 offset-md-10 text-right mt-3">
                                    <button type="submit" class="btn btn-outline-dark ">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
