@extends('layout.layout_teacher')
@section('title', 'Chỉnh sửa câu hỏi môn học')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-subject') }}">Môn học</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('view-question-subject') }}">Câu hỏi môn học</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa câu hỏi môn học</li>
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
                <section class="col-lg-6 offset-lg-3">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA CÂU HỎI MÔN HỌC</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="">Nội dung</label>
                                    <textarea name="" rows="3" class="form-control" placeholder="Nhập nội dung câu hỏi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Hình ảnh</label> <br>
                                    <input type="file" id="file" required/>
                                    <img src="{{ url('public/images/qpan.jpg') }}" style="max-width:100%;height:60px;border-radius:5px;">
                                </div>
                                <div class="form-group">
                                    <label for="">Đáp án A</label>
                                    <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Đáp án B</label>
                                    <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Đáp án C</label>
                                    <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Đáp án D</label>
                                    <textarea name="" rows="2" class="form-control" placeholder="Nhập nội dung đáp án"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Chọn đáp án Đúng</label>
                                    <input name="" type="text" class="form-control" placeholder="Nhập đáp án đúng VD: A">
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>


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
    </script>

@endsection
{{--=============================================================--}}
