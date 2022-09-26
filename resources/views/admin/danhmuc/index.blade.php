@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Danh Mục</div>

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

                    <div class="mb-3">
                        <a href="{{ route('danhmuc.create') }}" type="button" class="btn btn-primary">Thêm</a>
                    </div>  

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Slug</th>
                                <th>Mô Tả</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        @foreach ($danhMucTruyen as $key => $danhmuc )
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->slug}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td>
                                    @if ($danhmuc->kichhoat==0)
                                        <span class="text text-success">Có</span>
                                    @else
                                        <span class="text text-danger">Không</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('danhmuc.edit',[$danhmuc->id])}}" class="btn btn-primary">Edit</a>

                                    <form action="{{route('danhmuc.destroy',[$danhmuc->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa danh mục này?');" class="btn btn-danger">Xóa</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
