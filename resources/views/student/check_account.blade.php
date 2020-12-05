@extends('student.layout.master')
@section('title', 'Check account')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3"></div>
            <div class="span6">
                <style>
                    .card{
                        padding-top: 50px;
                        text-align: center;
                    }
                </style>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nhập mật khẩu bài thi</h4>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{ url('/post-check-account') }}" method="post">
                            @csrf

                            <input type="hidden" name="deKiemTraId" value="{{ $deKiemTra }}">

                            <input type="hidden" name="hs_id" value="{{ Auth::user()->id }}">


                            <div class="form-group">
                                <label for=""></label>
                                <input type="password" class="form-control" name="password" id="password"
                                       aria-describedby="helpId"
                                       placeholder="">
                                {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                            </div>

                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span3"></div>
        </div>
    </div>
@endsection
