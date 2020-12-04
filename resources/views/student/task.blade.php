@extends('student.layout.master')
@section('title', 'Testing')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4">
                <h4 style="text-align: center">Danh sách câu hỏi</h4>
                <hr>

                @foreach($cauHois as $key => $value)
                    @if($value->dap_an_chon != null)
                        <button onclick="getQuestion({{ $value->id }} + ',' + {{ $key }} )"
                                style="margin-bottom: 5px; background-color: #727171;" class="btn btn-default">{{ ++$key }}</button>
                    @else
                        <button style="margin-bottom: 5px;" class="btn btn-default">{{ ++$key }}</button>
                    @endif
                @endforeach

                <br><br>
                <span><strong>Thời gian: </strong>
                    <span style="color: red; font-weight: bold;" id="demo"><span id="minus"></span>:<span id="seconds"></span></span> phút</span>
                <input type="hidden" name="time" id="time" value="{{ $thoiGian }}">
                <div style="float: right">
                    <a href="" class="btn btn-info">Lưu câu trả lời</a>
                    <a href="" class="btn btn-success">Nộp bài</a>
                </div>
            </div>

            <div class="span8" id="cauhoi" style="border: 1px solid black;padding: 10px 10px;border-radius: 5px;">

                @foreach($showCauHoi as $key => $value)
                    <strong style="color: black; font-size: 17px;">Câu {{ ++$key }}:</strong>
                    <strong style="color: black; font-size: 17px;">{{ $value->noi_dung }}</strong>

                    <div class="radio">
                        <label>
                            @if($value->dap_an_chon == 'A')
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                       value="{{ $value->dap_an_chon }}" checked>
                            @else
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                       value="A">
                            @endif
                            A: {{ $value->a }}
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            @if($value->dap_an_chon == 'B')
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                       value="{{ $value->dap_an_chon }}" checked>
                            @else
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="B">
                            @endif
                            B: {{ $value->b }}
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            @if($value->dap_an_chon == 'C')
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                       value="{{ $value->dap_an_chon }}" checked>
                            @else
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="C">
                            @endif
                            C: {{ $value->c }}
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            @if($value->dap_an_chon == 'D')
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                                       value="{{ $value->dap_an_chon }}" checked>
                            @else
                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="D">
                            @endif
                            D: {{ $value->d }}
                        </label>
                    </div>
                    <br>
                @endforeach
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

        function getQuestion(e){
            var ele = e.split(",");
            var ktra = document.getElementById('txt_solg').value;

            $.ajax({
                url: '{{ route('getQuestion') }}',
                method: "get",
                data: {_token: '{{ csrf_token() }}',
                    key: ele[0],
                    deKiemTraId: ele[1],
                    chiTietCauHoiId: ele[2]
                },
                success: function (response) {
                    e.preventDefault();
                }
            });
        }

    </script>
@endsection
