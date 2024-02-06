@isset($cell)
    <input class="form-control"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif(isset($cell->default)){{ $cell->default }}@endif">
@endisset



