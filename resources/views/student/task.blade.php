@extends('student.layout.master_test')
@section('title', 'Testing')
@section('content')
    <br><br>
    <div class="container-fluid">
        <style>
            .sticky {
                position: fixed;
                top: 100px;
            }

            .fixRight{
                position: relative;
                top: 10px;
                left: 400px;
            }
        </style>
        <div class="row-fluid">

            <div class="span4" id="myHeader">

                <h4 style="text-align: center">Danh sách câu hỏi</h4>
                <hr>

                @foreach($cauHois as $key => $value)
                    @php($check = false)
                    @foreach($chiTietBaiLam as $ctbl)
                        @if($ctbl->chi_tiet_cau_hoi == $value->id && $ctbl->dap_an_chon != null)
                            @php($check = true)
                            @break
                        @endif
                    @endforeach
                    @if($check == true)
                        <button style="margin-bottom: 5px; background-color: #727171;" class="btn btn-default">{{ ++$key }}</button>
                    @else
                        <button style="margin-bottom: 5px;" class="btn btn-default">{{ ++$key }}</button>
                    @endif
                @endforeach

                <br><br>

                <span><strong>Thời gian: </strong>
                    <span style="color: red; font-weight: bold;" id="demo"><span id="minus"></span>:<span id="seconds"></span></span> phút</span>
                <input type="hidden" name="time" id="time" value="{{ $thoiGian }}">
                <input type="hidden" name="thoi_gian_bat_dau_lam" id="thoi_gian_bat_dau_lam"
                       value="{{ $thoiGianBatDauLam }}">

                <input type="hidden" name="deKiemTraId" id="deKiemTraId" value="{{ $deKiemTraId }}">
                <input type="hidden" name="monHocId" id="monHocId" value="{{ $maMon[0]->id }}">
                <input type="hidden" name="hocSinhId" id="hocSinhId" value="{{ $hocSinhId }}">
                <input type="hidden" name="baiLamId" id="baiLamId" value="{{ $baiLamId }}">

                <div style="float: right">
                    <button onclick="return saveAnswer()" class="btn btn-info">Lưu câu trả lời</button>

                    <a href="{{ url('/finish-testing/'.$deKiemTraId.'/'.$hocSinhId) }}" class="btn btn-success">Nộp bài</a>
                </div>
            </div >

            <div class="span8" id="cauhoi" style="border: 1px solid black;padding: 10px 10px;border-radius: 5px;">

                @foreach($cauHois as $key => $value)

                    <strong style="color: black; font-size: 17px;">Câu {{ ++$key }}:</strong>
                    <strong style="color: black; font-size: 17px;">{{ $value->noi_dung }}</strong>

                    @if(!empty($chiTietBaiLam))
                        @php($ktra = false)
                        @foreach($chiTietBaiLam as $ctbl)
                            @if($ctbl->chi_tiet_cau_hoi == $value->id)
                                @php($ktra = true)
                                @break
                            @endif
                        @endforeach

                        @if($ktra == true)

                            <div class="radio">
                                <label>
                                    @if($ctbl->dap_an_chon == 'A')
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="{{ $ctbl->dap_an_chon }}" checked>
                                    @else
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="A">
                                    @endif
                                    A: {{ $value->a }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    @if($ctbl->dap_an_chon == 'B')
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="{{ $ctbl->dap_an_chon }}" checked>
                                    @else
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="B">
                                    @endif
                                    B: {{ $value->b }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    @if($ctbl->dap_an_chon == 'C')
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="{{ $ctbl->dap_an_chon }}" checked>
                                    @else
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="C">
                                    @endif
                                    C: {{ $value->c }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    @if($ctbl->dap_an_chon == 'D')
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="{{ $ctbl->dap_an_chon }}" checked>
                                    @else
                                        <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                               onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                               value="D">
                                    @endif
                                    D: {{ $value->d }}
                                </label>
                            </div>
                            <br>
                        @else
                            <div class="radio">
                                <label>
                                    <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                           onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                           value="A">
                                    A: {{ $value->a }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                           onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                           value="B">
                                    B: {{ $value->b }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                           onclick="updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                           value="C">
                                    C: {{ $value->c }}
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                           onclick="return updateAnswer({{ $baiLamId }} + ',' + {{ $value->id }} + ',' + this.value)"
                                           value="D">
                                    D: {{ $value->d }}
                                </label>
                            </div>
                            <br>
                        @endif
                    @endif
                @endforeach
            </div>

        </div>

    </div>

    <script>
        var timeout = null;
        var time = parseInt(document.getElementById('time').value);

        var thoiGianBatDauLam = new Date(document.getElementById('thoi_gian_bat_dau_lam').value);

        var currentTime = new Date();
        var diff = Math.abs(currentTime - thoiGianBatDauLam);

        var soPhutDaLam = parseInt(diff / 60000);
        var soGiayDaLam = parseInt(diff % 60000)
        var phutConLai = time - soPhutDaLam;
        var giayConLai = parseInt((59000 - soGiayDaLam) / 1000);

        var seconds = 59;
        var m = null;
        var s = null;

        function start(){
            if(m == null){
                m = phutConLai;
                s = giayConLai;
            }
            if(s == -1){
                m -= 1;
                s = 59;
            }
            if(m <= 0){
                clearTimeout(timeout);
                alert('Hết giờ');
                window.close();
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
    <script>
        function getQuestion(e){
            var ele = e.split(",");
            $.ajax({
                url: '{{ url('/get-question') }}',
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                    chiTietCauHoiId: ele[0],
                    key: ele[1]
                },
                success: function () {
                    location.reload();
                }
            });
        }

        function updateAnswer(e){
            var ele = e.split(",");
            $.ajax({
                url: '{{ route('updateAnswer') }}',
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    baiLam: ele[0],
                    chiTietCauHoi: ele[1],
                    dapAnChon: ele[2]
                },
                success: function () {
                    e.preventDefault();
                }
            });
        }

        function saveAnswer(){
            location.reload();
        }
    </script>
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        var cauhoi = document.getElementById("cauhoi");
        var cauhoiSticky = cauhoi.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky && window.pageYOffset > cauhoiSticky) {
                header.classList.add("sticky");
                cauhoi.classList.add("fixRight");
            } else {
                header.classList.remove("sticky");
                cauhoi.classList.remove("fixRight");
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
