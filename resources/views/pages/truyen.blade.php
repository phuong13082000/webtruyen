@extends('../layout')

@section('content')
    <style>
        .infotruyen {
            list-style: none;
        }

        .mucluctruyen {
            list-style: square;
        }
    </style>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{asset('public/uploads/truyen/truyen82.jpeg')}}" alt="">
                </div>
                <div class="col-md-9">
                    <ul class="infotruyen">
                        <li>Tác giả:</li>
                        <li>Thể loại:</li>
                        <li>Số chapter:</li>
                        <li>Số lượt xem:</li>
                        <li><a href="#">Xem mục lục</a></li>
                        <li><a href="#" class="btn btn-primary">Đọc online</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <h4>
                    Tóm tắt
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, autem cumque cupiditate ducimus
                    eaque earum facilis harum laborum modi nemo nulla obcaecati, quaerat rem sapiente tempore vero
                    vitae?
                    At, quia?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iusto officia praesentium quae
                    quod sapiente sunt vel. A aut culpa cum, dolor dolorem eos molestiae nisi non officia sit? Enim!</p>
            </div>
            <hr>
            <h4>Mục Lục</h4>
            <ul class="mucluctruyen">
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
                <li><a href="#">chuong 1-</a></li>
            </ul>
            <h4>Sách cùng danh mục</h4>
            <div class="row">

                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a href="#">
                            <img class="card-img-top" alt="" src="{{asset('public/uploads/truyen/truyen82.jpeg')}}">
                            <div class="card-body">
                                <h5>This is a wider card with supporting text below</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusantium
                                    aliquam culpa cupiditate deserunt earum expedita fugit illo laudantium nesciunt odit
                                    praesentium, quas quibusdam, reprehenderit sapiente soluta suscipit vel, vitae
                                    voluptates?</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a href="#">
                            <img class="card-img-top" alt="" src="{{asset('public/uploads/truyen/truyen82.jpeg')}}">
                            <div class="card-body">
                                <h5>This is a wider card with supporting text below</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusantium
                                    aliquam culpa cupiditate deserunt earum expedita fugit illo laudantium nesciunt odit
                                    praesentium, quas quibusdam, reprehenderit sapiente soluta suscipit vel, vitae
                                    voluptates?</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a href="#">
                            <img class="card-img-top" alt="" src="{{asset('public/uploads/truyen/truyen82.jpeg')}}">
                            <div class="card-body">
                                <h5>This is a wider card with supporting text below</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusantium
                                    aliquam culpa cupiditate deserunt earum expedita fugit illo laudantium nesciunt odit
                                    praesentium, quas quibusdam, reprehenderit sapiente soluta suscipit vel, vitae
                                    voluptates?</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a href="#">
                            <img class="card-img-top" alt="" src="{{asset('public/uploads/truyen/truyen82.jpeg')}}">
                            <div class="card-body">
                                <h5>This is a wider card with supporting text below</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusantium
                                    aliquam culpa cupiditate deserunt earum expedita fugit illo laudantium nesciunt odit
                                    praesentium, quas quibusdam, reprehenderit sapiente soluta suscipit vel, vitae
                                    voluptates?</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <h3>Sách xem nhiều</h3>
        </div>
    </div>
@endsection
