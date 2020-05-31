@section('jumbotron.comment', '협업을 통해 당신만의 음악을 완성하세요!')
@section('jumbotron.url', route('project.index', 'collaboration'))
@section('jumbotron.page', 'Collaboration')
@section('search')
    <div class="text-center">
        <form action="{{ route('project.search', 'collaboration') }}" class="form-inline">
            <div class="w-50 mx-auto">
                <input class="form-control" placeholder="검색어" type="text" name="word" required>
                <button type="submit" class="btn btn-outline-dark btn-light">
                    <img src="{{ getFile('storage/icon/search.png') }}" style="width:1rem;" alt="">
                </button>
            </div>
        </form>
    </div>
@endsection
