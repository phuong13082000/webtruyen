@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Truyện</div>

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

                        <form method="POST" action="{{ route('truyen.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tên Truyện</label>
                                    <input type="text" class="form-control" id="slug" name="tentruyen"
                                        onkeyup="ChangeToSlug();" value="{{ old('tentruyen') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Slug truyện</label>
                                    <input type="text" class="form-control" id="convert_slug" name="slug_truyen"
                                        value="{{ old('slug_truyen') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tóm tắt truyện</label>
                                    <textarea class="form-control" name="tomtat" id="desc_truyen" value="{{ old('tomtat') }}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tác giả</label>
                                    <input type="text" class="form-control" id="tacgia" name="tacgia"
                                        value="{{ old('tacgia') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Từ khóa</label>
                                    <input type="text" class="form-control" id="tukhoa" name="tukhoa"
                                        value="{{ old('tukhoa') }}">
                                </div>
                            </div>
                            <!--
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Danh mục truyện</label>
                                    <select name="danhmuc" class="form-select" aria-label="Default select example">
                                        @foreach ($danhmuc as $key => $muc)
                                            <option value="{{ $muc->id }}">{{ $muc->tendanhmuc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Thể loại truyện</label>
                                    <select name="theloai" class="form-select" aria-label="Default select example">
                                        @foreach ($theloai as $key => $the)
                                            <option value="{{ $the->id }}">{{ $the->tentheloai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            -->

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Danh mục truyện:</label><br>
                                    
                                        @foreach ($danhmuc as $key => $muc)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="danhmuc[]" id="danhmuc_{{ $muc->id }}" class="form-check-input" value="{{ $muc->id }}">
                                                <label for="danhmuc_{{ $muc->id }}" class="form-check-lable">{{ $muc->tendanhmuc }}</label>
                                            </div>
                                        @endforeach
                                    
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Thể loại truyện:</label><br>
                                    
                                        @foreach ($theloai as $key => $the)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="theloai[]" id="theloai_{{ $the->id }}" class="form-check-input" value="{{ $the->id }}">
                                                <label for="theloai_{{ $the->id }}" class="form-check-lable">{{ $the->tentheloai }}</label>
                                            </div>
                                        @endforeach
                                    
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Hình ảnh truyện</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="hinhanh">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Kích Hoạt</label>
                                    <select name="kichhoat" class="form-select" aria-label="Default select example">
                                        <option selected value="0">Có</option>
                                        <option value="1">Không</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
