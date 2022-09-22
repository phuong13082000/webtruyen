@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Thể Loại</div>

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
                                <th>Tên Thể Loại</th>
                                <th>Slug</th>
                                <th>Mô Tả</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        @foreach ($theLoai as $key => $tl )
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$tl->tentheloai}}</td>
                                <td>{{$tl->slug}}</td>
                                <td>{{$tl->mota}}</td>
                                <td>
                                    @if ($tl->kichhoat==0)
                                        <span class="text text-success">Có</span>
                                    @else
                                        <span class="text text-danger">Không</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('theloai.edit',[$tl->id])}}" class="btn btn-primary">Edit</a>

                                    <form action="{{route('theloai.destroy',[$tl->id])}}" method="POST">
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
