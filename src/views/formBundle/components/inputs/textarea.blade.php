@isset($cell)
    <textarea
        class="form-control"
        name="{{ $cell->name }}"
        id="{{ $cell->id }}"
        placeholder="{{ $cell->placeholder }}"
        @if($cell->required == true) required @endif
        @isset($cell->rows) rows="{{ $cell->rows }}" @endisset
        @isset($cell->cols) cols="{{ $cell->cols }}" @endisset
        @isset($cell->min) minlength="{{ $cell->min }}" @endisset
        @isset($cell->max) maxlength="{{ $cell->max }}" @endisset
        >@if(isset($cell->default)){{ $cell->default }}@else{{ old($cell->name) }}@endif</textarea>
@endisset



