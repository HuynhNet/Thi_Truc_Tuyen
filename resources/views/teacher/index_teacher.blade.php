@extends('layout.layout_teacher')
@section('title', 'Trang giáo viên')

{{--=============================================================--}}
{{--Phân cấp cha con--}}
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                </div><!-- /.col -->
                <div class="col-sm-10">
                    <ol class="breadcrumb float-sm-right">
                        {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
{{--=============================================================--}}


{{--=============================================================--}}
{{--Nội dung chính--}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>15</h3>
                            <p>Môn học</p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Đề kiểm tra</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>200</h3>
                            <p>Câu hỏi</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-question"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>MÔN HỌC</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã môn học</th>
                                        <th scope="col">Tên môn học</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="STT">1</td>
                                            <td data-label="Mã môn học" class="p-1">
                                                BP-345
                                            </td>
                                            <td data-label="Tên môn học">
                                                Biên phòng cơ bản 1
                                            </td>
                                            <td data-label="Hình ảnh">
                                                <a href="{{ url('public/images/qpan.jpg') }}">
                                                    <img src="{{ url('public/images/qpan.jpg') }}" class="img-fluid rounded-top"
                                                    style="max-width:100%;height:60px;">
                                                </a>
                                            </td>
                                            <td data-label="Trạng thái">
                                              <b class="text-success">Đang dạy</b>
                                            </td>
                                            <td data-label="Chọn">
                                                <a name="" id="" class="btn btn-outline-success btn-xs" href="#" role="button">
                                                    <i class="fa fa-eye"></i> Xem câu hỏi
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
{{--=============================================================--}}
