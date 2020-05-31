@extends('layouts.app')

@include('project.completed.jumbotron')

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
                    <div class="text-center text-light">완성작이 없습니다.</div>
                @endforelse
            </div>
            <div class="mx-auto">
                {{ $projects->links() }}
            </div>
        </div>
    </div>


@endsection
