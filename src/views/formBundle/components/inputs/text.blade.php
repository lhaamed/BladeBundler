@isset($cell)
    <input class="form-control @isset($cell->input_class){{$cell->input_class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @isset($cell->min) minlength="{{$cell->min}}" @endisset
           @if(isset($cell->max)) maxlength="{{ $cell->max }}" @endif
           @if($cell->isReversed()) dir="ltr" @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif"
           @if($cell->isRequired()) required @endif
           @isset($cell->pattern) pattern="{{ $cell->pattern }}" @endisset
           @isset($cell->pattern_title) title="{{ $cell->pattern_title }}" @endisset
           @if($cell->isDisabled()) disabled @endif>
@endisset

