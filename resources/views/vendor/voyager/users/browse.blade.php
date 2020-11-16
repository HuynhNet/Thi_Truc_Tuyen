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
                <a href="{{ url('/admin/add-teacher') }}" class="btn btn-success">Thêm GV</a>
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
                        @php( $gv = DB::table('users')->where('role_id', 3)->get())
                        @foreach($gv as $key => $gv)
                            <tr id="tr_{{ $gv->id }}">

                                <td data-label="STT">
                                    {{ $key + 1 }}
                                </td>

                                <td data-label="Họ và tên">
                                    {{ $gv->name }}
                                </td>

                                <td data-label="Mã GV">
                                    {{ $gv->ma_gv }}
                                </td>

                                <td data-label="Giới tính">
                                    {{ $gv->gioi_tinh }}
                                </td>

                                <td data-label="Ngày sinh">
                                    {{ $gv->ngay_sinh }}
                                </td>

                                <td data-label="Email">
                                    {{ $gv->email }}
                                </td>

                                <td data-label="Điện thoại">
                                    {{ $gv->sdt }}
                                </td>

                                <td data-label="Địa chỉ">
                                    {{ $gv->dia_chi }}
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
                        @endforeach

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
                        @php( $hs = DB::table('users')->where('role_id', 4)->get())
                        @foreach($hs as $key => $hs)
                            <tr id="tr_{{ $hs->id }}">

                                <td data-label="STT">
                                    {{ $key + 1 }}
                                </td>

                                <td data-label="Họ và tên">
                                    {{ $hs->name }}
                                </td>

                                <td data-label="Mã GV">
                                    {{ $hs->ma_hs }}
                                </td>

                                <td data-label="Giới tính">
                                    {{ $hs->gioi_tinh }}
                                </td>

                                <td data-label="Ngày sinh">
                                    {{ $hs->ngay_sinh }}
                                </td>

                                <td data-label="Email">
                                    {{ $hs->email }}
                                </td>

                                <td data-label="Điện thoại">
                                    {{ $hs->sdt }}
                                </td>

                                <td data-label="Địa chỉ">
                                    {{ $hs->dia_chi }}
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
                        @endforeach
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

        var msg1 = '{{Session::get('create_teacher')}}';
        var exist1 = '{{Session::has('create_teacher')}}';
        if(exist1){
            swal({
                title: "Đã thêm giáo viên thành công.",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',

    </script>
@stop
