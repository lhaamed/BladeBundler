@isset($cell)
    @if($cell->isMultiple())
        <div class="btn-group pills" role="group" aria-label="Basic checkbox toggle button group">
            @foreach($cell->list as $key => $checkbox)
                <input type="checkbox" class="btn-check" name="{{$cell->name}}[]" value="{{$key}}" id="{{$key}}" autocomplete="off">
                <label class="btn btn-lg btn-outline-{{$checkbox['style'] ?? 'dark'}}" for="{{$key}}">
                    @if(isset($checkbox['icon']))
                        @fs($checkbox['icon'],'fa-duotone')
                    @endif
                    @if(isset($checkbox['title']))
                        <span>{{$checkbox['title']}}</span>
                    @endif
                </label>
            @endforeach

            {{--
            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
            --}}
        </div>
    @else
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

            @foreach($cell->list as $key => $radio)
                <input type="radio" class="btn-check" name="{{$cell->name}}" value="{{$key}}" id="{{$key}}" autocomplete="off">
                <label class="btn btn-lg btn-outline-{{$radio['style'] ?? 'dark'}}" for="{{$key}}">
                    @if(isset($radio['icon']))
                        @fs($radio['icon'],'fa-duotone')
                    @endif
                    @if(isset($radio['title']))
                        <span>{{$radio['title']}}</span>
                    @endif
                </label>
            @endforeach

            {{--
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
            --}}
        </div>

    @endif

@endisset


