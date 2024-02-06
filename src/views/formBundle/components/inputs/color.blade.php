@isset($cell)
    <input class="form-control @isset($cell->class){{$cell->class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @if($cell->required) required @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif(isset($cell->default)){{ $cell->default }}@endif"
           @if(isset($cell->disabled) && $cell->disabled) disabled @endif>
@endisset

