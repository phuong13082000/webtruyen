@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Truyện</div>

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

                        <form method="POST" action="{{ route('truyen.update', [$truyen->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tên Truyện</label>
                                    <input type="text" class="form-control" id="slug" name="tentruyen"
                                        onkeyup="ChangeToSlug();" value="{{ $truyen->tentruyen }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Slug truyện</label>
                                    <input type="text" class="form-control" id="convert_slug" name="slug_truyen"
                                        value="{{ $truyen->slug_truyen }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tóm tắt truyện</label>
                                    <textarea class="form-control" name="tomtat" id="desc_truyen">{{ $truyen->tomtat }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Tác giả</label>
                                    <input type="text" class="form-control" id="tacgia" name="tacgia"
                                        value="{{ $truyen->tacgia }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Từ khóa</label>
                                    <input type="text" class="form-control" id="tukhoa" name="tukhoa"
                                        value="{{ $truyen->tukhoa }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Danh mục truyện: </label><br>
                                    @foreach ($danhmuc as $dm)
                                        <div class="form-check form-check-inline">
                                            @foreach ($thuocdanhmuc as $thuocdanh)
                                                <input type="checkbox" {{ $thuocdanh->id ? 'checked' : '' }}
                                                    name="danhmuc[]" id="danhmuc_{{ $dm->id }}"
                                                    class="form-check-input" value="{{ $dm->id }}">
                                            @endforeach
                                            <label for="danhmuc_{{ $dm->id }}"
                                                class="form-check-lable">{{ $dm->tendanhmuc }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Thể loại truyện:</label><br>
                                    @foreach ($theloai as $tl)
                                        <div class="form-check form-check-inline">
                                            @foreach ($thuoctheloai as $thuocloai)
                                                <input type="checkbox" {{ $thuocloai->id ? 'checked' : '' }}
                                                    name="theloai[]" id="theloai_{{ $tl->id }}"
                                                    class="form-check-input" value="{{ $tl->id }}">
                                            @endforeach
                                            <label for="theloai_{{ $tl->id }}"
                                                class="form-check-lable">{{ $tl->tentheloai }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Hình ảnh truyện</label>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="hinhanh">
                                    <img src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" height="150px"
                                        weight="150px">

                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Kích Hoạt</label>
                                    <select name="kichhoat" class="form-select" aria-label="Default select example">
                                        @if ($truyen->kichhoat == 0)
                                            <option selected value="0">Có</option>
                                            <option value="1">Không</option>
                                        @else
                                            <option value="0">Có</option>
                                            <option selected value="1">Không</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                    </div>
                    <button type="submit" name="edittruyen" class="btn btn-primary">Cập Nhật</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
