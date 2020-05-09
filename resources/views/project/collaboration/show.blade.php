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
                         style="background-image: url({{asset('storage/background/night.jpg')}}); background-size: cover;">
                        <div class="lyrics-background" style="overflow-y: scroll;">
                            <div class="lyrics text-light p-5">
                                자꾸만 설레이는 내 맘 봄이 오는가봐 이렇게
                                들뜨는 기분 너를 만나 이번엔 전하려 해 내 마음을
                                너도 봄기운 느꼈을까 괜히 설레는 거 아닐까
                                봄바람이 기분좋게 살랑이면은
                                내 마음도 살랑살랑 미칠것같아
                                봄이 분위기를 만들잖아 이렇게
                                너를 생각나게 만들잖아 어떡해
                                봄이 분위기를 만들잖아 이렇게
                                너를 좋아하게 만들잖아 어떡해
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion " id="accordionExample" style="">
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-left text-success "
                                            type="button"
                                            data-toggle="collapse"
                                            data-target="#collapse1"
                                            aria-expanded="true" aria-controls="collapse1">
                                        <div>#4 작사 완성했습니다. 고칠 부분 있으면 메일로 알려주세요. 참고로 1절 2절 후렴구 똑같습니다.</div>
                                        <div class="pt-2" style="font-size: small">정해진</div>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse1" class="collapse show " aria-labelledby="heading1"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                    squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                    craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                    <table class="table table-hover table-sm mt-1 text-center"
                                           style="margin-bottom: 0rem;">
                                        <thead>
                                        <tr>
                                            <th scope="col">AudioFile</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">cojfnrisll.mp3</a></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-left text-danger"
                                            type="button"
                                            data-toggle="collapse"
                                            data-target="#collapse2"
                                            aria-expanded="true" aria-controls="collapse2">
                                        <div>#3 보컬 완성했습니다. 고칠 부분 있으면 메일로 알려주세요. 참고로 1절 2절 후렴구 똑같습니다.</div>
                                        <div class="pt-2" style="font-size: small">정해진</div>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse2" class="collapse show " aria-labelledby="heading2"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                    squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                    craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                    <table class="table table-hover table-sm mt-1 text-center"
                                           style="margin-bottom: 0rem;">
                                        <thead>
                                        <tr>
                                            <th scope="col">AudioFile</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">cojfnrisll.mp3</a></td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">cojfnrsdadffdisll.mp3</a></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-decoration-none text-left text-primary"
                                            type="button"
                                            data-toggle="collapse"
                                            data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <div>#2 편곡 완성했습니다. 고칠 부분 있으면 메일로 알려주세요. 참고로 1절 2절 후렴구 똑같습니다.</div>
                                        <div class="pt-2" style="font-size: small">정해진</div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                    squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                    craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                    <table class="table table-hover table-sm mt-1 text-center"
                                           style="margin-bottom: 0rem;">
                                        <thead>
                                        <tr>
                                            <th scope="col">AudioFile</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">cojfnrisll.mp3</a></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-decoration-none text-left text-dark"
                                            type="button"
                                            data-toggle="collapse"
                                            data-target="#collapse4" aria-expanded="false"
                                            aria-controls="collapse4">
                                        <div>#1 작곡 완성했습니다. 고칠 부분 있으면 메일로 알려주세요. 참고로 1절 2절 후렴구 똑같습니다.</div>
                                        <div class="pt-2" style="font-size: small">정해진</div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                    squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                    craft
                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher
                                    vice
                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you
                                    probably haven't heard of them accusamus labore sustainable VHS.
                                    <table class="table table-hover table-sm mt-1 text-center"
                                           style="margin-bottom: 0rem;">
                                        <thead>
                                        <tr>
                                            <th scope="col">AudioFile</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">cojfnrisll.mp3</a></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card mt-4">
                <div class="card-body" style="min-height: 10rem; ">
                    이 노래는
                </div>
            </div>

            <div class="container mt-3 mb-3 text-center">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" type="button" class="btn btn-outline-dark font-weight-bold bg-light disabled">작곡
                            신청</a>
                        <a href="#" type="button" class="btn btn-outline-primary font-weight-bold bg-light">편곡
                            신청</a>
                        <a href="#" type="button" class="btn btn-outline-success font-weight-bold bg-light">작사
                            신청</a>
                        <a href="#" type="button" class="btn btn-outline-danger font-weight-bold bg-light">보컬 신청</a>
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
    </div>






@endsection
