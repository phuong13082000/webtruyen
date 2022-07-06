@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Danh Mục</div>

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

                    <form method="POST" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="form-label">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="" name="tendanhmuc" >
                            </div>

                            <div class="form-group">
                                <label class="form-label">Mô Tả Danh Mục</label>
                                <input type="text" class="form-control" id="" name="mota" >
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kích Hoạt</label>
                                <select name="kichhoat" class="form-select" aria-label="Default select example">
                                    <option selected value="0">Có</option>
                                    <option value="1">Không</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
