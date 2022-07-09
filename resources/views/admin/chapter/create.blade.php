@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Chapter</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('chapter.store')}}">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tên Chapter</label>
                                    <input type="text" class="form-control" id="slug" name="tieude"
                                           onkeyup="ChangeToSlug();" value="{{old('tieude')}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Slug Chapter</label>
                                    <input type="text" class="form-control" id="convert_slug" name="slug_chapter"
                                           value="{{old('slug_chapter')}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tóm tắt Chapter</label>
                                    <input type="text" class="form-control" id="" name="tomtat"
                                           value="{{old('tomtat')}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nội dung Chapter</label>
                                    <textarea id="desc_chapter" name="noidung" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Thuộc truyện</label>
                                    <select name="truyen_id" class="form-select" aria-label="Default select example">
                                        @foreach($truyen as $key => $value)
                                            <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kích Hoạt</label>
                                    <select name="kichhoat" class="form-select" aria-label="Default select example">
                                        <option selected value="0">Có</option>
                                        <option value="1">Không</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="createchapter" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
