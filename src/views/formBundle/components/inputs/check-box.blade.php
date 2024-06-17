@isset($cell)
    <div class="form-check p-0">
        <input type="checkbox" @if(isset($cell->default) && !!$cell->default) checked @endif
        id="{{ $cell->id }}" name="{{ $cell->name }}" value="{{ $cell->value }}">
        <label class="form-check-label px-2" for="{{ $cell->id }}">{{ $cell->label }}</label>
    </div>
@endisset


