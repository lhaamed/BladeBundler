@isset($cell)
    <input class="form-control {{$cell->input_class}}"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif">
@endisset



