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

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Mô Tả</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        @foreach ($danhMucTruyen as $key => $danhmuc )
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td>
                                    @if ($danhmuc->kichhoat==0)
                                        <span class="text text-success">Có</span>
                                    @else
                                        <span class="text text-danger">Không</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{route('danhmuc.destroy',['danhmuc' => $danhmuc->id])}}" method="POST">
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
