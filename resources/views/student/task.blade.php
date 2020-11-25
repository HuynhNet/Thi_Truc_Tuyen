@extends('student.layout.master')
@section('title', 'Testing')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4">
                <h4 style="text-align: center">Danh sách câu hỏi</h4>
                <hr>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">1</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">2</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">3</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">4</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">5</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">6</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">7</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">8</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">9</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">10</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">11</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">12</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">13</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">14</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">15</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">16</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">17</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">18</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">19</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">20</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">21</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">22</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">23</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">24</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">25</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">26</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">27</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">28</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">29</a>
                <a style="margin-bottom: 5px;" href="" class="btn btn-default">30</a>
                <br><br>
                <span><strong>Thời gian: </strong>
                    <span style="color: red; font-weight: bold;" id="demo"><span id="minus"></span>:<span id="seconds"></span></span> phút</span>
                <input type="hidden" name="time" id="time" value="30">
                <div style="float: right">
                    <a href="" class="btn btn-info">Lưu câu trả lời</a>
                    <a href="" class="btn btn-success">Nộp bài</a>
                </div>
            </div>

            <div class="span8" id="cauhoi" style="border: 1px solid black;padding: 10px 10px;border-radius: 5px;">
                <strong style="color: black; font-size: 17px;">Câu 1:</strong>
                <strong style="color: black; font-size: 17px;">Giá cả sản xuất tư bản chủ nghĩa bao gồm những bộ phận nào?</strong>
                <div class="form-check" style="padding-left: 10px; font-size: 16px;">
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        A: Chi phí sản xuất cộng với lợi nhuận bình quân
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px; font-size: 16px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        B: Toàn bộ chi phí bỏ ra trong quá trình sản xuất.
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px; font-size: 16px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        C: Giá cả thị trường trừ đi lợi nhuận của nhà tư bản công nghiệp.
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px; font-size: 16px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        D: Giá trị của hàng hoá cộng với lợi nhuận của nhà tư bản công nghiệp.
                    </label>
                </div>
                <br>
                <strong style="color: black; font-size: 17px;">Câu 2:</strong>
                <strong style="color: black; font-size: 17px;">
                    Ý nghĩa của việc phân chia tư bản thành tư bản bất biến và tư bản khả biến?
                </strong>
                <div class="form-check" style="padding-left: 10px;">
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        A: Để cải tiến quản lý tư bản.
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        B: Để tăng cường bóc lột công nhân làm thuê.
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        C: Để xác định vai trò của mỗi loại tư bản đối với việc sản xuất ra giá trị thặng dư và phê
                            phán quan điểm máy móc, tư bản tạo ra giá trị thặng dư cho chủ sở hữu nó.
                    </label>
                    <label class="form-check-label" style="margin-top: 10px; font-size: 16px;">
                        <input style="margin-right: 5px; margin-bottom: 5px;" type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                        D: Để tìm ra cơ cấu của mỗi loại tư bản.
                    </label>
                </div>
            </div>
        </div>
    </div>

    <script>
        var timeout = null;
        var time = parseInt(document.getElementById('time').value);

        if(time == 45){
            var minus = 44;
        }

        if(time == 30){
            var minus = 29;
        }else{
            var minus = 14;
        }

        var seconds = 59;
        var m = null;
        var s = null;

        function start(){

            if(m == null){
                m = minus;
                s = seconds;
            }

            if(s == -1){
                m -= 1;
                s = 59;
            }

            if(m == -1){
                clearTimeout(timeout);
                alert('Hết giờ');
                return false;
            }

            document.getElementById('minus').innerText = m;
            if(s < 10){
                document.getElementById('seconds').innerText = '0' + s;
            }else{
                document.getElementById('seconds').innerText = s;
            }

            timeout = setTimeout(function (){
                s -= 1;
                start();
            },1000);
        }

        window.onload = function(){
            start();
        }

    </script>
@endsection
