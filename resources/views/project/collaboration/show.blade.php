@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div class="container">
        <div class="container col-md-10 p-5 mx-auto text-dark"
             style="background-color: #fffacc;  min-height: 1000px; opacity: 0.95; color: #d6d8db">
            <h3 class="project-title text-left">[발라드] 봄이 분위기를 만들잖아</h3>
            <div class="project-opener text-right">by 정해진</div>
            <div>
                <hr class="mb-3">
            </div>
            <div class="container">
                <div class="row"
                     style="background-image: url({{asset('storage/background/p_y.png')}}); background-size: cover; margin-left: 0rem; margin-right: 0rem;">
                    <div class="project-image col-lg-6 text-center"
                         style="background-image: url({{asset('storage/background/night.jpg')}}); background-size: cover;">
                    </div>

                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-decoration-none text-success" type="button" data-toggle="collapse"
                                        data-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">
                                    #4 작사
                                </button>
                            </h2>
                        </div>

                        <div id="collapse1" class="collapse show " aria-labelledby="heading1"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
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
                                <button class="btn btn-link text-decoration-none text-danger" type="button" data-toggle="collapse"
                                        data-target="#collapse2"
                                        aria-expanded="true" aria-controls="collapse2">
                                    #3 보컬
                                </button>
                            </h2>
                        </div>

                        <div id="collapse2" class="collapse show " aria-labelledby="heading2"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
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
                                <button class="btn btn-link collapsed decoration-none text-primary" type="button" data-toggle="collapse"
                                        data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    #2 편곡
                                </button>
                            </h2>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
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
                                <button class="btn btn-link collapsed text-decoration-none text-dark" type="button" data-toggle="collapse"
                                        data-target="#collapse4" aria-expanded="false"
                                        aria-controls="collapse4">
                                    #1 작곡
                                </button>
                            </h2>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="heading4"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
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
                <div class="container mt-3 mb-3 text-center">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="#" type="button" class="btn btn-outline-dark font-weight-bold bg-light disabled">작곡 신청</a>
                            <a href="#" type="button" class="btn btn-outline-primary font-weight-bold bg-light">편곡 신청</a>
                            <a href="#" type="button" class="btn btn-outline-success font-weight-bold bg-light">작사 신청</a>
                            <a href="#" type="button" class="btn btn-outline-danger font-weight-bold bg-light">보컬 신청</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>





@endsection
