@isset($cell)
    <textarea
        class="form-control"
        name="{{ $cell->name }}"
        id="{{ $cell->id }}"
        placeholder="{{ $cell->placeholder }}"
        @if($cell->isRequired()) required @endif
        @if($cell->isReversed()) dir="ltr" @endif
        @if($cell->isDisabled()) disabled @endif
        @isset($cell->rows) rows="{{ $cell->rows }}" @endisset
        @isset($cell->cols) cols="{{ $cell->cols }}" @endisset
        @isset($cell->min) minlength="{{ $cell->min }}" @endisset
        @isset($cell->max) maxlength="{{ $cell->max }}" @endisset
        >@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif</textarea>
@endisset



