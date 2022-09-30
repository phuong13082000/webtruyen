@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cấp vai trò cho role</div>
                    <div class="card-body">
                        <form action="{{url('insert-roles/'.$user->id)}}" method="POST">
                            @csrf

                            <div class="mt-3">
                                @if(isset($all_column_roles))
                                    @foreach($role as $key => $r)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   {{$r->id == $all_column_roles->id ? 'checked' : ''}} type="radio"
                                                   name="role"
                                                   id="{{$r->id}}" value="{{$r->name}}">
                                            <lable class="form-check-label" for="{{$r->id}}">{{$r->name}}</lable>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="{{$r->id}}"
                                               value="{{$r->name}}">
                                        <lable class="form-check-label" for="{{$r->id}}">{{$r->name}}</lable>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                <input type="submit" name="insertroles" value="Cấp quyền cho user"
                                       class="btn btn-success">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
