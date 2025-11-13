@isset($inputObject)

    <input class="form-control  {{$cell->input_class}}"
           type="{{ $inputObject['type'] }}"
           id="{{ $inputObject['id'] }}"
           name="{{ $inputObject['name'] }}"
           @isset($inputObject['min']) minlength="{{$inputObject['min']}}" @endisset
           @isset($inputObject['max']) minlength="{{$inputObject['max']}}" @endisset
           placeholder="{{ $inputObject['placeholder'] }}"
           @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif
           @if(isset($inputObject['max'])) maxlength="{{ $inputObject['max'] }}" @endif
           value="@if(old($inputObject['id']) !== null){{ old($inputObject['id']) }}@elseif(isset($inputObject['default_value'])){{ $inputObject['default_value'] }}@endif"
           @if($inputObject['required'] == true) required @endif @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif>
@endisset

