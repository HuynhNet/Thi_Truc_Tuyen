@extends('layout.layout_teacher')
@section('title', 'Trang kết quả kiểm tra')

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
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Kết quả kiểm tra</li>
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
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>KẾT QUẢ KIỂM TRA</b>
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
                                        <th scope="col">Tên đề</th>
                                        <th scope="col">Môn học</th>
                                        <th scope="col">Loại kiểm tra</th>
                                        <th scope="col">Số câu hỏi</th>
                                        <th scope="col">Số người làm bài</th>
                                        <th scope="col">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($view_result_tests as $key => $show_test_subjec)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Tên đề"><b>{{ $show_test_subjec->ten_de }}</b></td>
                                            <td data-label="Môn học">
                                                @php($subjects = DB::table('mon_hocs')->where('id',$show_test_subjec->mon_hoc)->get())
                                                @foreach($subjects as $subject)
                                                    <b>{{ $subject->ten_mon_hoc }}</b>
                                                @endforeach
                                            </td>
                                            <td data-label="Loại kiểm tra">
                                                @php($type_tests = DB::table('loai_kiem_tras')->where('id',$show_test_subjec->loai_kiem_tra)->get())
                                                @foreach($type_tests as $type_test)
                                                    {{ $type_test->ten_loai }}
                                                @endforeach
                                            </td>
                                            <td data-label="Số câu hỏi">
                                                {{ $show_test_subjec->so_cau }} câu
                                            </td>
                                            <td data-label="Số người làm bài">
                                                @php($count_persons = DB::table('ket_quas')->where('de_kiem_tra',$show_test_subjec->id)->count())
                                                {{ $count_persons }}
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                   href="{{ url('view-detail-result-test/'.$user_ids->id.'/'.$show_test_subjec->id) }}" role="button" title="Xem chi tiết đề kiểm tra">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">
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


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('post-add-subject') }}" class="needs-validation" novalidate name="myForm" method="POST"
                      enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"><b>THÊM MÔN HỌC</b></h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mã môn học</label>
                            <input type="text" name="inputSubjectCode" class="form-control" placeholder="Nhập mã môn học" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tên môn học</label>
                            <input type="text" name="inputSubjectName" class="form-control" placeholder="Nhập tên môn học" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label> <br>
                            <!-- File input field -->
                            <input type="file" id="file" onchange="return fileValidation()" name="inputFileImage"/>
                            <!-- Image preview -->
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">
                            <i class="fa fa-close"></i> Đóng
                        </button>
                        <button type="submit" class="btn btn-primary btn-xs">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Hình ảnh bắt buộc đuôi .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="max-width:100%;height:50px;margin-top:5px;"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        function validateForm() {
            var x = document.forms["myForm"]["inputFileImage"].value;
            if (x == "") {
                alert("Chưa chọn tệp file hình ảnh !");
                return false;
            }
        }
    </script>

@endsection
{{--=============================================================--}}
