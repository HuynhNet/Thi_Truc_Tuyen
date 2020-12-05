@extends('student.layout.master_test')
@section('title', 'Result')
@section('content')
    <style type="text/css" media="screen">
        table {
            padding: 0;
            width: 100%;
            table-layout: auto;

        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .10em;
        }

        table th,
        table td {
            padding: .20em;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table th {
            font-size: 12px;
            text-transform: uppercase;
            color: black;
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
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
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .6em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
                border: 1px solid #ddd;
            }
        }

        /*error jquery*/
        .error{
            color:red;
            font-style: italic;
        }
    </style>
    <br><br>
    <div class="container-fluid">
        <div class="span12">
            <h3 style="text-align: center">Kết Quả - Kiểm tra {{ $thoiGian }} phút</h3>
            <p style="text-align: center">{{ $tenMonHoc }}</p>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Số câu trả lời đúng</th>
                        <th>Điểm số</th>
                        <th>Xếp loại</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="text-align: center;"><p>{{ $tenHS }}</p></td>
                        <td style="text-align: center;">{{ $soCauDung }}/{{ $tongCauHoi }}</td>
                        <td style="text-align: center;">{{ $diem }}</td>
                        <td style="text-align: center;">{{ $xepLoai }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
