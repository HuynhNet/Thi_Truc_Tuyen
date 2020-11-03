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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="password" class="form-control" name="" id="" aria-describedby="helpId"
                                       placeholder="">
                                {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                            </div>
                            <a type="submit" href="" class="btn btn-primary">Xác nhận</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span3"></div>
        </div>
    </div>
@endsection
