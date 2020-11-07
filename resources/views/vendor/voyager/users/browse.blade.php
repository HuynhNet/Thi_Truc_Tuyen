@extends('voyager::master')

@section('head')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endsection

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))


@section('page_header')
    <style>
        h2{
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản Lý User</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin/add-student') }}" class="btn btn-primary">Thêm HS</a>
                <a href="" class="btn btn-success">Thêm GV</a>
                <a href="" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <style type="text/css" media="screen">
        table {
            padding:10px;
            width: 100%;
            table-layout:auto;
        }
        table tr {
            background-color: white;
            padding:auto;
            padding-bottom:10px;
        }
        table th,
        table td {
            padding:10px;
            border: 1px solid #ddd;
            font-size: 13px;
        }
        table th {
            font-size: 10px;
            text-transform: uppercase;
            color: black;font-weight: bold;
        }

        /* Peponsive */
        @media screen and (max-width: 600px) {
            table{
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }
            table tr {
                display: block;
                margin-bottom: .100em;
            }
            table td {
                display: block;
                padding:5px;
                font-size: 10px;
                text-align: right;
            }
            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;

            }
            table td:last-child {
                border: 1px solid #ddd;
            }
            .el-overlay-1{
                width:100%;height:auto;
            }

        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Danh sách Giáo Viên</h3>
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Mã GV</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col" colspan="2">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody id="users-crud">

                                <tr id="user_id_1">

                                    <td data-label="STT">
                                        1
                                    </td>

                                    <td data-label="Họ và tên">
                                        Nguyễn Văn A
                                    </td>

                                    <td data-label="Mã GV">
                                        GV1457369
                                    </td>

                                    <td data-label="Giới tính">
                                        Nam
                                    </td>

                                    <td data-label="Ngày sinh">
                                        10-09-1980
                                    </td>

                                    <td data-label="Email">
                                        nguyena@gmail.com
                                    </td>

                                    <td data-label="Điện thoại">
                                        0964736846
                                    </td>

                                    <td data-label="Địa chỉ">
                                        Cần Thơ, Việt Nam
                                    </td>

                                    <td data-label="Tùy chọn">
                                        <a class="btn btn-primary" role="button" title="Thay đổi quyền" href="">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td data-label="Tùy chọn">
                                        <a class="btn btn-danger" role="button" title="Xóa"
                                           onclick="return confirm('Bạn có chắc không?');"
                                           href="">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Danh sách Học Sinh</h3>
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Mã HS</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col" colspan="2">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody id="users-crud">

                        <tr id="user_id_1">

                            <td data-label="STT">
                                1
                            </td>

                            <td data-label="Họ và tên">
                                Nguyễn Văn An
                            </td>

                            <td data-label="Mã GV">
                                HS145736
                            </td>

                            <td data-label="Giới tính">
                                Nam
                            </td>

                            <td data-label="Ngày sinh">
                                10-09-1998
                            </td>

                            <td data-label="Email">
                                an@gmail.com
                            </td>

                            <td data-label="Điện thoại">
                                0964736547
                            </td>

                            <td data-label="Địa chỉ">
                                Cần Thơ, Việt Nam
                            </td>

                            <td data-label="Tùy chọn">
                                <a class="btn btn-primary" role="button" title="Thay đổi quyền" href="">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </a>
                            </td>

                            <td data-label="Tùy chọn">
                                <a class="btn btn-danger" role="button" title="Xóa"
                                   onclick="return confirm('Bạn có chắc không?');"
                                   href="">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var msg = '{{Session::get('create_student')}}';
        var exist = '{{Session::has('create_student')}}';
        if(exist){
            swal({
                title: "Đã thêm học sinh thành công.",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>
@stop
