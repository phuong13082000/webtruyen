@extends('../layout')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $chapter->slug_chapter }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <h4>{{ $chapter->truyen->tentruyen }}</h4>
            <p>Chương hiện tại: {{ $chapter->tieude }}</p>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">Chọn chương: </label>
                    <select name="kichhoat" id="select-chapter" class="custom-select select-chapter">
                        @foreach ($all_chapter as $key => $chap)
                            <option value="{{ url('xem-chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</option>
                        @endforeach
                    </select>
                </div>

                <br><br>
                <div class="noidungchuong">
                    {!! $chapter->noidung !!}


                </div>

                <h3>Lưu và chia sẻ chuyện: </h3>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>

            </div>
        </div>
    </div>
@endsection
