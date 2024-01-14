@isset($cell)
    <textarea
        class="form-control"
        name="{{ $cell->name }}"
        placeholder="{{ $cell->placeholder }}"
        @if($cell->required === true) required @endif
        rows="{{ $cell->rows }}" cols="{{ $cell->cols }}"
        @isset($cell->min) minlength="{{ $cell->min }}" @endisset
        maxlength="{{ $cell->max }}"
        id="{{ $cell->id }}">@if(isset($cell->default)){{ $cell->default }}@else{{ old($cell->name) }}@endif</textarea>
@endisset


