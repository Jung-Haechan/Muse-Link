@section('jumbotron.comment', '완성된 작품들을 구경해보세요!')
@section('jumbotron.url', route('project.index', 'completed'))
@section('jumbotron.page', 'Masterpiece')
@section('search')
    <div class="text-center">
        <form action="{{ route('project.search', 'completed') }}" class="form-inline">
            <div class="w-50 mx-auto">
                <input class="form-control" placeholder="검색어" type="text" name="word" required>
                <button type="submit" class="btn btn-outline-dark btn-light">
                    <img src="{{ getFile('storage/icon/search.png') }}" style="width:1rem;" alt="">
                </button>
            </div>
        </form>
    </div>
@endsection

