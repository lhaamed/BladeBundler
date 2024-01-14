@isset($cell)
    <input class="form-control @isset($cell->class){{$cell->class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           @isset($cell->min) minlength="{{$cell->min}}" @endisset
           @if(isset($cell->max)) maxlength="{{ $cell->max }}" @endif
           placeholder="{{ $cell->placeholder }}"
           @if(isset($cell->reverse) && $cell->reverse === true) dir="ltr" @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif(isset($cell->default)){{ $cell->default }}@endif"
           @if($cell->required) required @endif
            @isset($cell->pattern) pattern="{{ $cell->pattern }}" @endisset
           @if(isset($cell->disabled) && $cell->disabled) disabled @endif>
@endisset

