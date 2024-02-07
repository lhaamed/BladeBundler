@isset($cell)
    <input class="form-control" {{--class="level-card-preview-input"--}}
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           accept="{{ $cell->accept }}"
           onchange="previewData(event)">
@endisset


