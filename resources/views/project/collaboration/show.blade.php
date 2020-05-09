@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div>
        <div class="container col-md-10 p-5 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image mx-auto mb-3"
                         style="background-image: url({{ $project->cover_img_file ? asset(getFile($project->cover_img_file)) : asset('storage/base/base_logo.jpg') }}); background-size: cover;">
                        <div class="lyrics-background" style="overflow-y: scroll;">
                            <div class="lyrics text-light p-5">
                                {{ $project->lyrics_version ? $project->lyrics_version->lyrics : NULL}}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <audio controls="controls">
                            <source src="track.ogg" type="audio/ogg"/>
                            <source src="track.mp3" type="audio/mpeg"/>
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion " id="accordionExample" style="">
                        @forelse($versions as $version)
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link text-decoration-none text-left text-success "
                                                type="button"
                                                data-toggle="collapse"
                                                data-target="#collapse1"
                                                aria-expanded="true" aria-controls="collapse1">
                                            <div>
                                                #{{ $version->rownum }} {{ translateRole($version->role) }} {{ $version->title }}</div>
                                            <div class="pt-2" style="font-size: small">{{ $version->user->name }}</div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse1" class="collapse show " aria-labelledby="heading1"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{ $version->description }}
                                        <table class="table table-hover table-sm mt-1 text-center"
                                               style="margin-bottom: 0rem;">
                                            <thead>
                                            <tr>
                                                <th scope="col">AudioFile</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="#">{{ $version->title }}.mp3</a></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

            </div>
            <div class="card mt-4">
                <div class="card-body" style="min-height: 10rem; ">
                    {{ $project->description }}
                </div>
            </div>

            <div class="container mt-3 mb-3 text-center">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ route('project.version.create', [$project->id, 'composer']) }}" type="button"
                           class="btn btn-outline-dark font-weight-bold bg-light disabled">작곡
                            신청</a>
                        <a href="{{ route('project.version.create', [$project->id, 'editor']) }}" type="button"
                           class="btn btn-outline-primary font-weight-bold bg-light">편곡
                            신청</a>
                        <a href="{{ route('project.version.create', [$project->id, 'lyricist']) }}" type="button"
                           class="btn btn-outline-success font-weight-bold bg-light">작사
                            신청</a>
                        <a href="{{ route('project.version.create', [$project->id, 'singer']) }}" type="button"
                           class="btn btn-outline-danger font-weight-bold bg-light">보컬 신청</a>
                    </div>
                </div>
                <hr>
                <div class="container bg-light">
                    <div class="row">

                        <div class="media">
                            <div class="media-left">
                                <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading title">Fahmi Arif</h4>
                                <p class="komen">
                                    kalo bisa ya ndak usah gan biar cepet<br>
                                    <a href="#">reply</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="geser">
                            <div class="media">
                                <div class="media-left">
                                    <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading title">Fahmi Arif</h4>
                                    <p class="komen">
                                        kalo bisa ya ndak usah gan biar cepet<br>
                                        <a href="#">reply</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection
