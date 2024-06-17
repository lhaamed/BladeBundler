@isset($cell)
    <input class="form-control" type="{{ $cell->type }}" id="{{ $cell->id }}" name="{{ $cell->name }}"
           accept="{{ $cell->accept }}">
@endisset


