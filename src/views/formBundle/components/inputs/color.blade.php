@isset($cell)
    <input class="form-control @isset($cell->class){{$cell->class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @if($cell->isRequired()) required @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif"
           @if($cell->isDisabled()) disabled @endif>
@endisset

