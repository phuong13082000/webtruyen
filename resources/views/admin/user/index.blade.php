@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt Kê User</div>

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
                                    <th>Tên User</th>
                                    <th>Quản Lý</th>
                                </tr>
                            </thead>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
