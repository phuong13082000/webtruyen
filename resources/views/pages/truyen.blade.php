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
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $truyen->slug_truyen }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}"
                        alt="{{ $truyen->tentruyen }}"><br><br>
                </div>
                <div class="col-md-9">
                    <ul class="infotruyen">
                        <li><h3>{{ $truyen->tentruyen }}</h3></li>
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Danh mục: <a href="{{ url('danh-muc/'.$truyen->danhmuctruyen->slug) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a> </li>
                        <li>Số chapter:</li>
                        <li>Số lượt xem:</li>
                        <li><a href="#mucluc">Xem mục lục</a></li>
                        <li><a href="{{ url('xem-chapter/'.$chapter_dau->slug_chapter) }}" class="btn btn-primary">Đọc online</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <h4>
                    Tóm tắt
                </h4>
                <p>{{ $truyen->tomtat }}</p>
            </div>
            <hr>
            <h4 class="mucluc">Mục Lục</h4>

            <ul class="mucluctruyen">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc>0)
                    @foreach ($chapter as $key => $chap)
                    <li><a href="{{ url('xem-chapter/'.$chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
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
                                <p class="card-text">{{ $value->tomtat }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}" class="btn btn-sm btn-outline-secondary">Watch Now</a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>&nbsp;1111</a>
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
