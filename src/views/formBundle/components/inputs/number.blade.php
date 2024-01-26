@isset($cell)
    <input class="form-control"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           placeholder="{{ $cell->placeholder }}"
           @if(isset($cell->min)) min="{{ $cell->min }}" @endif
           @if(isset($cell->max)) max="{{ $cell->max }}" @endif
           step="{{ $cell->step }}"
           value="@if(isset($cell->default)){{ $cell->default }}@else{{ old($cell->name) }}@endif"
           @if($cell->required === true) required @endif
           @if(isset($cell->disabled) && $cell->disabled === true) disabled @endif>
@endisset


