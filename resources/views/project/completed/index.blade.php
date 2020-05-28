@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 프로젝트를 공유하세요!</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="{{ route('project.index', 'completed') }}"
           class="text-light text-decoration-none">Masterpiece</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <div class="row">
                @forelse($projects as $project)
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a class="text-decoration-none"
                           href="{{ route('project.show', ['completed', $project->id]) }}">
                            <div class="card card-music container">
                                <div class="row text-dark bg-dark" style="height: 9rem;">

                                    <img class="card-img-top mb-3 mx-auto"
                                         src="{{ $project->cover_img_file ? getFile($project->cover_img_file) : asset('storage/base/base_logo.jpg') }}"
                                         style="width:9rem; height:9rem; object-fit: cover;" alt="Card image cap">

                                </div>
                                <div class="card-body text-dark">
                                    <div class="" style="font-size: 0.7rem">{{ getTime($project->completed_at) }}</div>
                                    <h5 class="card-title text-left text-truncate">
                                        @if($project->genre) [{{ $project->genre }}] @endif {{ $project->title }}
                                    </h5>
                                    <div class="card-text">
                                        by {{ $project->user->name }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="mx-auto">
                {{ $projects->links() }}
            </div>
        </div>
    </div>


@endsection
