@section('jumbotron.comment', '당신과 협업할 가수를 찾아보세요.')
@section('jumbotron.url', route('user.index', 'singer'))
@section('jumbotron.page', 'Singer')
@section('search')
    <div class="text-center">
        <form action="{{ route('user.search', 'singer') }}" class="form-inline">
            <div class="w-50 mx-auto">
                <input class="form-control" placeholder="검색어" type="text" name="word" required>
                <button type="submit" class="btn btn-outline-dark btn-light">
                    <img src="{{ getFile('storage/icon/search.png') }}" style="width:1rem;" alt="">
                </button>
            </div>
        </form>
    </div>
@endsection
