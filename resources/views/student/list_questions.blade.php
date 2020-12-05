<div class="span8" id="cauhoi" style="border: 1px solid black;padding: 10px 10px;border-radius: 5px;">

    @foreach($listQuestions as $key => $value)
        <strong style="color: black; font-size: 17px;">Câu {{ ++$key }}:</strong>
        <strong style="color: black; font-size: 17px;">{{ $value->noi_dung }}</strong>

        <div class="radio">
            <label>
                {{--                            @if($value->dap_an_chon == 'A')--}}
                {{--                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"--}}
                {{--                                       value="{{ $value->dap_an_chon }}" checked>--}}
                {{--                            @else--}}
                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"
                       value="A">
                {{--                            @endif--}}
                A: {{ $value->a }}
            </label>
        </div>

        <div class="radio">
            <label>
                {{--                            @if($value->dap_an_chon == 'B')--}}
                {{--                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"--}}
                {{--                                       value="{{ $value->dap_an_chon }}" checked>--}}
                {{--                            @else--}}
                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="B">
                {{--                            @endif--}}
                B: {{ $value->b }}
            </label>
        </div>

        <div class="radio">
            <label>
                {{--                            @if($value->dap_an_chon == 'C')--}}
                {{--                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"--}}
                {{--                                       value="{{ $value->dap_an_chon }}" checked>--}}
                {{--                            @else--}}
                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="C">
                {{--                            @endif--}}
                C: {{ $value->c }}
            </label>
        </div>

        <div class="radio">
            <label>
                {{--                            @if($value->dap_an_chon == 'D')--}}
                {{--                                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}"--}}
                {{--                                       value="{{ $value->dap_an_chon }}" checked>--}}
                {{--                            @else--}}
                <input type="radio" name="{{ $value->id }}" id="{{ $value->id }}" value="D">
                {{--                            @endif--}}
                D: {{ $value->d }}
            </label>
        </div>
        <br>
    @endforeach
</div>
