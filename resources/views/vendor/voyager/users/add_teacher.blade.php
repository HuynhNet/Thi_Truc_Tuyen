@extends('voyager::master')

@section('head')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('page_title', 'Add Student')

@section('page_header')
    <style>
        h2{
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm Giáo Viên</h2>
            </div>
        </div>

    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('postAddTeacher') }}" method="post">
                            @csrf

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Họ tên</label>
                                    <input type="text"
                                           class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                                    {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mã HS</h5>
                                    <input type="text" class="form-control" id="randomCode"
                                           placeholder="Vd: HS157534" name="code">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <button style="margin-top: 33px;" type="button" class="btn btn-info"
                                            id="generateCode"
                                            data-toggle="tooltip" title="Tạo mã HS">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <h5>Mật khẩu:</h5>
                                    <input type="text" class="form-control" id="randomPassword"
                                           placeholder="Vd: 9Xw3e*ty" name="password">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <button style="margin-top: 33px;" type="button" class="btn btn-info"
                                            id="generatePassword"
                                            data-toggle="tooltip" title="Tạo mật khẩu">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" onblur="return isEmail()"
                                           class="form-control" name="email" id="email" aria-describedby="helpId"
                                           placeholder="">
                                    {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Giới tính</label>
                                    <select class="form-control" name="gioiTinh" id="gioiTinh">
                                        <option value="">Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Ngày sinh</label>
                                    <input type="date"
                                           class="form-control" name="date" id="date" aria-describedby="helpId"
                                           placeholder="">
                                    {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" onblur="return Test_numberphone()"
                                           class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="">
                                    {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <textarea class="form-control" name="address" id="address" cols="10" rows="3"></textarea>
                                    {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                {{--<a type="submit" class="btn btn-success">THÊM</a>--}}
                                <button type="submit" style="float: right;" class="btn btn-success">THÊM</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function Test_numberphone(){
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('#phone').val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại không đúng định dạng. Vui lòng nhập lại');
                }
            }
        }
        function isEmail() {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var email = $('#email').val();
            if(email !==''){
                if(regex.test(email) == false){
                    alert('Email không đúng định dạng. Vui lòng nhập lại');
                }
            }
        }
    </script>

    <script type="text/javascript">
        function random_password_generate(max,min)
        {
            var passwordChars =
                "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#@!%&*";
            var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
            var randPassword = Array(randPwLen).fill(passwordChars).map(function(x)
            { return x[Math.floor(Math.random() * x.length)] }).join('');
            return randPassword;
        }
        document.getElementById("generatePassword").addEventListener("click", function(){
            random_password = random_password_generate(8,8);
            document.getElementById("randomPassword").value = random_password;
        });
    </script>

    <script type="text/javascript">
        function random_code_generate(max,min)
        {
            var code = "0123456789";
            var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
            var randCode = Array(randPwLen).fill(code).map(function(x)
            { return x[Math.floor(Math.random() * x.length)] }).join('');
            return "GV" + randCode;
        }
        document.getElementById("generateCode").addEventListener("click", function(){
            random_code = random_code_generate(6,6);
            document.getElementById("randomCode").value = random_code;
        });
    </script>

@endsection
