@isset($cell)
    <label for="{{ $cell->id }}" class="picture-preview-js">
        <img src="{{ $cell->default_preview }}" alt="" id="{{ $cell->preview_id }}">
        <input class="picture-preview-input-js" type="file" id="{{ $cell->id }}"
               name="{{ $cell->name }}"
               accept="{{ $cell->accept }}"
        style="visibility: hidden">
    </label>
@endisset


