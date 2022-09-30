@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liệt Kê User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{route('user.create')}}" class="btn btn-primary">Thêm user</a><br><br>

                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên User</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Quản Lý</th>
                                </tr>
                                </thead>
                                @foreach($user as $key => $u)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>
                                            @foreach($u->roles as $key => $role)
                                                {{$role->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($role->permissions as $key => $permission)
                                                <span class="badge bg-black">{{$permission->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{url('phan-vai-tro/'.$u->id)}}" class="btn btn-primary">Phân
                                                vai trò</a>
                                            <a href="{{url('phan-quyen/'.$u->id)}}" class="btn btn-primary">Phân
                                                quyền</a>
                                            <a href="{{url('/impersonate/user/'.$u->id)}}" class="btn btn-primary">Chuyển quyền nhanh</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
