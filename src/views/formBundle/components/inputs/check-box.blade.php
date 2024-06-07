@isset($cell)
    <div class="form-check mt-4 pt-3 px-2">
        <input type="checkbox" @if(isset($cell->default)) checked @endif
        id="{{ $cell->id }}" name="{{ $cell->name }}">
        <label class="form-check-label mx-2" for="{{ $cell->id }}">{{ $cell->label }}</label>
    </div>

@endisset


