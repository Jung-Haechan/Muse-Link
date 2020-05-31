@section('jumbotron.comment', '실력있는 음악인들과 자유롭게 소통하세요!')
@section('jumbotron.url', route('post.index', 'Forum'))
@section('jumbotron.page', 'Forum')
@section('search')
    <div class="text-center">
        <form action="{{ route('post.search') }}" class="form-inline">
            <div class="w-50 mx-auto">
                <input class="form-control" placeholder="검색어" type="text" name="word" required>
                <button type="submit" class="btn btn-outline-dark btn-light">
                    <img src="{{ getFile('storage/icon/search.png') }}" style="width:1rem;" alt="">
                </button>
            </div>
        </form>
    </div>
@endsection
