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
                    <select name="kichhoat" class="custom-select">
                        <option value="0">chuong 1</option>
                    </select>
                </div>
                <br><br>
                <div class="noidungchuong">
                    {!! $chapter->noidung !!}
                </div>
            </div>
        </div>
    </div>
@endsection
