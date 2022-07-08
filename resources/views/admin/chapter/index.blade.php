@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Chapter</div>

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
                                <th>Tên Chapter</th>
                                <th>Slug</th>
                                <th>Tóm tắt</th>
                                <th>Nội dung</th>
                                <th>Thuộc truyện</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        @foreach ($list_chapter as $key => $chapter )
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$chapter->tieude}}</td>
                                <td>{{$chapter->slug_chapter}}</td>
                                <td>{{$chapter->tomtat}}</td>
                                <td>{{$chapter->noidung}}</td>
                                <td></td>
                                <td>
                                    @if ($chapter->kichhoat==0)
                                        <span class="text text-success">Có</span>
                                    @else
                                        <span class="text text-danger">Không</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('chapter.edit',['chapter'=>$chapter->id])}}" class="btn btn-primary">Edit</a>

                                    <form action="{{route('chapter.destroy',['chapter' => $chapter->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa chapter này?');" class="btn btn-danger">Xóa</button>
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
