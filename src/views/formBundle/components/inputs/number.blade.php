@isset($cell)
    <input class="form-control {{$cell->input_class}}"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @if(isset($cell->min)) min="{{ $cell->min }}" @endif
           @if(isset($cell->max)) max="{{ $cell->max }}" @endif
           step="{{ $cell->step }}"
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif"
           @if($cell->isReversed()) dir="ltr" @endif
           @if($cell->isRequired()) required @endif
           @if($cell->isDisabled()) disabled @endif>
@endisset


