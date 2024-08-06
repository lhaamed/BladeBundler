@isset($cell)
    <div style="position: relative">
        <input
            class="form-control @if($cell->show_switch) password-switcher-bbjs @endif @isset($cell->class){{$cell->class}} @endisset"
            type="{{ $cell->type }}"
            id="{{ $cell->id }}"
            name="{{ $cell->name }}"
            @isset($cell->min) minlength="{{$cell->min}}" @endisset
            @if(isset($cell->max)) maxlength="{{ $cell->max }}" @endif
            placeholder="{{ $cell->placeholder }}"
            @if($cell->isReversed()) dir="ltr" @endif
            value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif($cell->hasDefault()){{ $cell->default }}@endif"
            @if($cell->isRequired()) required @endif
            @if($cell->isDisabled()) disabled @endif
            autocomplete="false">
        @if($cell->shouldShowSwitch())
            <button type="button" tabindex="-1" style="position: absolute;left: 10px; top: 6px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/>
                </svg>
            </button>
        @endif

    </div>
@endisset

