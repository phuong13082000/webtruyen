@extends('../layout')

@section('slide')
    @include('pages.slide')
@endsection

@section('content')
    <style>
        .tagcloud01 ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .tagcloud01 ul li {
            display: inline-block;
            margin: 0 .3em .3em 0;
            padding: 0;
        }

        .tagcloud01 ul li a {
            display: inline-block;
            max-width: auto;
            height: 28px;
            line-height: 28px;
            padding: 0 1em;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 3px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            color: #333;
            font-size: 13px;
            text-decoration: none;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .tagcloud01 ul li a:hover {
            background-color: #3498db;
            border: 1px solid #3498db;
            color: #fff;
        }
    </style>

    <!--Sach-moi-->
    <div class="p-3">

        <h3>Sách mới</h3>
        <div class="album py-5 bg-light">
            <div class="row">
                @foreach ($truyen as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" alt=""
                                src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}">
                            <div class="card-body">
                                <h5>{{ $value->tentruyen }}</h5>
                                <div class="tagcloud01">
                                    <ul>
                                        @foreach ($value->thuocnhieudanhmuctruyen as $thuocdanh)
                                            <li><a href="{{ url('danh-muc/' .  $thuocdanh->slug) }}"><span>{{ $thuocdanh->tendanhmuc }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tagcloud01">
                                    <ul>
                                        @foreach ($value->thuocnhieutheloaitruyen as $thuocloai)
                                            <li><a href="{{ url('danh-muc/' .  $thuocloai->slug) }}"><span>{{ $thuocloai->tentheloai }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}"
                                            class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary"><i
                                                class="fas fa-eye"></i>&nbsp;1111</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--End-sach-moi-->
@endsection
