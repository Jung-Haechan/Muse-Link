<div class="bg-secondary text-light p-3" style="height: 100%">
    <div>참여한 프로젝트</div>
    <div id="joinedProjectCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner mt-3 mt-3">
            @forelse($collaborations as $collaboration)
                <div class="carousel-item
                @if($collaboration->id === $collaborations->first()->id)
                    active
                @endif
                    ">
                    <div class="mx-auto" style="width: 80%">
                        <a class="text-decoration-none"
                           href="{{ route('project.show', [$collaboration->project->is_completed ? 'completed' : 'collaboration', $collaboration->project->id]) }}">
                            <div class="card card-music container">
                                <div class="row text-dark bg-dark" style="height: 9rem;">
                                    <img class="card-img-top mb-3 mx-auto"
                                         src="{{ $collaboration->project->cover_img_file ? getFile($collaboration->project->cover_img_file) : asset('storage/base/base_logo.jpg') }}"
                                         style="width:9rem; height:9rem; object-fit: cover;" alt="Card image cap">

                                </div>
                                <div class="card-body text-dark">
                                    <div class=""
                                         style="font-size: 0.7rem">{{ $collaboration->project->created_at }}</div>
                                    <h5 class="card-title text-left text-truncate">
                                        @if($collaboration->project->genre) [{{ $collaboration->project->genre }}
                                        ] @endif {{ $collaboration->project->title }}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div>
                    프로젝트 없음
                </div>
            @endforelse
        </div>
        @if ($collaborations->count() > 1)
            <a class="carousel-control-prev" href="#joinedProjectCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#joinedProjectCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        @endif
    </div>
</div>
