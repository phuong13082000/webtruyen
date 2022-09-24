@extends('../layout')

@section('content')
    <style>
        .infotruyen {
            list-style: none;
        }

        .mucluctruyen {
            list-style: square;
        }

        .tagcloud05 ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .tagcloud05 ul li {
            display: inline-block;
            margin: 0 0 .3em 1em;
            padding: 0;
        }

        .tagcloud05 ul li a {
            position: relative;
            display: inline-block;
            height: 30px;
            line-height: 30px;
            padding: 0 1em;
            background-color: #3498db;
            border-radius: 0 3px 3px 0;
            color: #fff;
            font-size: 13px;
            text-decoration: none;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .tagcloud05 ul li a::before {
            position: absolute;
            top: 0;
            left: -15px;
            content: '';
            width: 0;
            height: 0;
            border-color: transparent #3498db transparent transparent;
            border-style: solid;
            border-width: 15px 15px 15px 0;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .tagcloud05 ul li a::after {
            position: absolute;
            top: 50%;
            left: 0;
            z-index: 2;
            display: block;
            content: '';
            width: 6px;
            height: 6px;
            margin-top: -3px;
            background-color: #fff;
            border-radius: 100%;
        }

        .tagcloud05 ul li span {
            display: block;
            max-width: auto;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .tagcloud05 ul li a:hover {
            background-color: #555;
            color: #fff;
        }

        .tagcloud05 ul li a:hover::before {
            border-right-color: #555;
        }
    </style>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $truyen->tentruyen }}</li>
        </ol>
    </nav>

    @php
        $mucluc = count($chapter);
    @endphp

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}"
                        alt="{{ $truyen->tentruyen }}"><br><br>
                </div>
                <div class="col-md-9">
                    <ul class="infotruyen">
                        <li>
                            <h3>{{ $truyen->tentruyen }}</h3>
                        </li>
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Danh mục:
                            @foreach ($truyen->thuocnhieudanhmuctruyen as $thuocdanh)
                                <span>{{ $thuocdanh->tendanhmuc }}</span>
                            @endforeach
                        </li>
                        <li>Thể loại:
                            @foreach ($truyen->thuocnhieutheloaitruyen as $thuocloai)
                                <span>{{ $thuocloai->tentheloai }}</span>
                            @endforeach
                        </li>
                        <li>Số chapter: {{ $mucluc }}</li>
                        <li>Số lượt xem:</li>
                        <li><a href="#mucluc">Xem mục lục</a></li>

                        @if ($chapter_dau)
                            <li><a href="{{ url('xem-chapter/' . $chapter_dau->slug_chapter) }}"
                                    class="btn btn-primary">Đọc
                                    online</a></li>
                        @else
                            <li><a href="#" class="btn btn-primary">Đang cập nhật</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <h4>Tóm tắt</h4>
                <p>{!! $truyen->tomtat !!}</p>
            </div>

            <hr>

            <h4>Từ khóa tìm kiếm:
                @php
                    $tukhoa = explode(',', $truyen->tukhoa);
                @endphp
                <div class="tagcloud05">
                    <ul>
                        @foreach ($tukhoa as $key => $tu)
                            <li><a href="{{ url('tag/' . \Str::slug($tu)) }}"><span>{{ $tu }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </h4>

            <hr>

            <h4 class="mucluc">Mục Lục</h4>
            <ul class="mucluctruyen">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc > 0)
                    @foreach ($chapter as $key => $chap)
                        <li><a href="{{ url('xem-chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
                    @endforeach
                @else
                    <li>Mục lục đang cập nhật ...</li>
                @endif

            </ul>

            <hr>
            <h4>Sách cùng danh mục</h4>
            <div class="row">

                @foreach ($truyen_cungdanhmuc as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" alt=""
                                src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}">
                            <div class="card-body">
                                <h5>{{ $value->tentruyen }}</h5>
                                <p class="card-text">{!! $value->tomtat !!}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}"
                                            class="btn btn-sm btn-outline-secondary">Watch Now</a>
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

        <div class="col-md-3">
            <h3>Sách xem nhiều</h3>
        </div>
    </div>
@endsection
