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

    <style>
        #text-danger:hover{
            color: white;
            text-shadow: 1px 1px 1px black, 0 0 25px blue, 0 0 5px darkblue;
        }
        #text-success:hover{
            color: white;
            text-shadow: 1px 1px 1px black, 0 0 25px blue, 0 0 5px darkblue;
        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @php($count_subject = DB::table('mon_hocs')->count())
                                {{ $count_subject }}
                            </h3>
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
                            <h3>
                                @php($count_test = DB::table('de_kiem_tras')->count())
                                {{ $count_test }}
                            </h3>
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
                            <h3>
                                @php($count_question = DB::table('cau_hois')->count())
                                {{ $count_question }}
                            </h3>
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
                                <b>MÔN HỌC MỚI ĐANG DẠY</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:10%;">Mã môn học</th>
                                        <th scope="col" style="width:30%;">Tên môn học</th>
                                        <th scope="col" style="width:25%;">Hình ảnh</th>
                                        <th scope="col" style="width:15%;">Trạng thái</th>
                                        <th scope="col" colspan="2" style="width:15%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($show_subjects = DB::table('mon_hocs')->where('trang_thai',1)->latest()->take(5)->get())
                                    @forelse($show_subjects as $key => $show_subject)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã môn học">
                                                <b>{{ $show_subject->ma_mon_hoc }}</b>
                                            </td>
                                            <td data-label="Tên môn học">
                                                <a href="{{ url('view-question-subject') }}">
                                                    <b>{{ $show_subject->ten_mon_hoc }}</b>
                                                </a>
                                            </td>
                                            <td data-label="Hình ảnh">
                                                <a href="{{ url('public/image_subject/'.$show_subject->hinh_anh) }}">
                                                    <img src="{{ url('public/image_subject/'.$show_subject->hinh_anh) }}" class="img-fluid rounded-top"
                                                         style="max-width:100%;height:60px;">
                                                </a>
                                            </td>
                                            <td data-label="Trạng thái">
                                                @if ($show_subject->trang_thai == 0 )
                                                    <a href="{{ url('active-subject/'.$show_subject->id) }}" title="Nhấp để Kích hoạt">
                                                        <b class="text-danger" id="text-danger">Chưa kích hoạt</b>
                                                    </a>
                                                @else
                                                    <a href="{{ url('inactive-subject/'.$show_subject->id) }}" title="Nhấp để Hủy kích hoạt">
                                                        <b class="text-success" id="text-success">Đã kích hoạt</b>
                                                    </a>
                                                @endif
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-xs"
                                                   href="{{ url('edit-subject/'.$show_subject->id) }}" role="button" title="Chỉnh sửa">
                                                    <i class="fa fa-edit"></i> Sửa
                                                </a>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                   href="{{ url('view-question-subject/'.$show_subject->id) }}" role="button" title="Xem câu hỏi">
                                                    <i class="fa fa-eye"></i> Xem
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
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
