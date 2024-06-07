@isset($cell)
    <select class="form-control @isset($cell->class){{$cell->class}} @endisset"
            id="{{ $cell->id }}"
            name="{{ $cell->name }}"
            dir="ltr"
            @if($cell->isRequired()) required @endif
            @if($cell->isDisabled()) disabled @endif
            @if($cell->isMultiple()) multiple @endif>
        @if(!$cell->isMultiple())
            <option
                @if(!$cell->hasDefault() && !old($cell->name) !== null) selected @endif
            @if($cell->isRequired()) disabled @endif
                value="">انتخاب نشده...
            </option>
        @endif
        @if(!$cell->isListEmpty())
            @foreach($cell->list as $key => $option)
                <option value="{{ $key }}"
                    @if($cell->isSingle())
                        @if($key == old($cell->name) || $cell->isDefaultValue($key)) selected @endif
                    @else
                        @if((old($cell->name) !== null && in_array($key,old($cell->name))) || $cell->isDefaultValue($key)) selected @endif
                    @endif
                >{!! $option !!}</option>
            @endforeach
        @endif
    </select>
@endisset


