@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Danh Mục</div>

                    <form method="POST" action="{{ route('danhmuc.update', [$danhmuc->id]) }}">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="slug" name="tendanhmuc"
                                    onkeyup="ChangeToSlug();" value="{{ $danhmuc->tendanhmuc }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Slug Danh Mục</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug"
                                    value="{{ $danhmuc->slug }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Mô Tả Danh Mục</label>
                                <input type="text" class="form-control" id="" name="mota"
                                    value="{{ $danhmuc->mota }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Kích Hoạt</label>
                                <select name="kichhoat" class="form-select" aria-label="Default select example">
                                    @if ($danhmuc->kichhoat == 0)
                                        <option selected value="0">Có</option>
                                        <option value="1">Không</option>
                                    @else
                                        <option value="0">Có</option>
                                        <option selected value="1">Không</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="m-3">
                            <button type="submit" name="editdanhmuc" class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('danhmuc.index') }}" type="button" class="btn btn-primary">Trở về</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
