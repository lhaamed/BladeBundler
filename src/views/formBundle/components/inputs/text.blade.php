@isset($cell)
    <input class="form-control @isset($cell->class){{$cell->class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @isset($cell->min) minlength="{{$cell->min}}" @endisset
           @if(isset($cell->max)) maxlength="{{ $cell->max }}" @endif
           @if(isset($cell->reverse) && $cell->reverse === true) dir="ltr" @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif(isset($cell->default)){{ $cell->default }}@endif"
           @if($cell->required) required @endif
           @isset($cell->pattern) pattern="{{ $cell->pattern }}" @endisset
           @isset($cell->pattern_title) title="{{ $cell->pattern_title }}" @endisset
           @if(isset($cell->disabled) && $cell->disabled) disabled @endif>
@endisset

