@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt Kê Truyện</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Truyện</th>
                                <th>Slug</th>
                                <th>Tóm tắt</th>
                                <th>Hình Ảnh</th>
                                <th>Danh Mục</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            @foreach($list_truyen as $key => $truyen)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$truyen->tentruyen}}</td>
                                    <td>{{$truyen->slug_truyen}}</td>
                                    <td>{{$truyen->tomtat}}</td>
                                    <td>
                                        <img src="{{asset('public/uploads/truyen/' . $truyen->hinhanh)}}" height="150px" weight="150px">
                                    </td>
                                    <td>{{$truyen->danhMucTruyen->tendanhmuc}}</td>
                                    <td>
                                        @if ($truyen->kichhoat==0)
                                            <span class="text text-success">Có</span>
                                        @else
                                            <span class="text text-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary">Edit</a>

                                        <form action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có muốn xóa truyện này?');"
                                                    class="btn btn-danger">Xóa
                                            </button>
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
