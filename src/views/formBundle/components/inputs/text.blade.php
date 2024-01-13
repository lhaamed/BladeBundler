@isset($cell)


{{--    {{ dd($errors,old('serial2.2'),old('serial2[].2')) }}--}}
    <input class="form-control @isset($cell->custom_class){{$cell->custom_class}} @endisset"
           type="{{ $cell->type }}"
           id="{{ $cell->id }}"
           name="{{ $cell->name }}"
           @isset($inputObject['min']) minlength="{{$inputObject['min']}}" @endisset
           @isset($inputObject['max']) minlength="{{$inputObject['max']}}" @endisset
           placeholder="{{ $cell->placeholder }}"
           @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif
           @if(isset($inputObject['max'])) maxlength="{{ $inputObject['max'] }}" @endif
           value="@if(old($cell->id) !== null){{ old($cell->id) }}@elseif(isset($cell->default)){{ $cell->default }}@endif"
           @if($cell->required) required @endif @if(isset($cell->disabled) && $cell->disabled) disabled @endif>
@endisset

