@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm quyền</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('insert-permission')}}">
                            @csrf
                            <div class="form-group">
                                <lable for="exampleInputEmail">Tên quyền</lable>
                                <input type="text" class="form-control" value="{{old('permission')}}"
                                       name="permission">
                            </div>

                            <div class="mt-3">
                                <input type="submit" name="insetper" value="Thêm quyền" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cấp quyền cho User: {{$user->name}}</div>
                    <div class="card-body">
                        <form action="{{url('assign-permission/'.$user->id)}}" method="POST">
                            @csrf
                            @if(isset($name_roles))
                                Vai trò hiện tại: {{$name_roles}}
                            @endif
                            <div class="mt-3">
                                @foreach($permission as $key => $per)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               @foreach($get_permission_via_role as $key => $get)
                                                   @if($get->id == $per->id)
                                                       checked
                                               @endif
                                               @endforeach
                                               name="permission[]" id="{{$per->id}}" value="{{$per->id}}">
                                        <lable class="form-check-label" for="{{$per->id}}">{{$per->name}}</lable>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <input type="submit" name="insertpermission" value="Cấp quyền cho role"
                                       class="btn btn-success">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
