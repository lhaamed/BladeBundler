@isset($cell)
    <input class="form-control {{$cell->input_class}}" type="{{ $cell->type }}" id="{{ $cell->id }}" name="{{ $cell->name }}"
           accept="{{ $cell->accept }}">
@endisset


