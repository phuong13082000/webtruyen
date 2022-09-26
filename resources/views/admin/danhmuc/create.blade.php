@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Danh Mục</div>

                    <form method="POST" action="{{ route('danhmuc.store') }}">
                        @csrf

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
                                <input type="text" class="form-control" id="slug" name="tendanhmuc" onkeyup="ChangeToSlug();" value="{{ old('tendanhmuc') }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Slug Danh Mục</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug" value="{{ old('slug') }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Mô Tả Danh Mục</label>
                                <input type="text" class="form-control" id="" name="mota" value="{{ old('mota') }}">
                            </div>
                        </div>

                        <div class="m-3">
                            <div class="form-group">
                                <label class="form-label">Kích Hoạt</label>
                                <select name="kichhoat" class="form-select" aria-label="Default select example">
                                    <option selected value="0">Có</option>
                                    <option value="1">Không</option>
                                </select>
                            </div>
                        </div>

                        <div class="m-3">
                            <button type="submit" name="themdanhmuc" class="btn btn-success">Thêm</button>
                            <a href="{{ route('danhmuc.index') }}" type="button" class="btn btn-primary">Trở về</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
