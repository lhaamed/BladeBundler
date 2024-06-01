@isset($inputObject)
    <div class="guarantee-code-wrapper">
        <div class="fields-wrapper">
            <input type="text" inputmode="numeric" maxlength="4" minlength="4"
                   class="form-control @isset($inputObject['input_custom_class']){{$inputObject['input_custom_class']}} @endisset"
                   @if($inputObject['required'] == true) required @endif
                   @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif
                   @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif>
            <input type="text" inputmode="numeric" maxlength="4" minlength="4"
                   class="form-control @isset($inputObject['input_custom_class']){{$inputObject['input_custom_class']}} @endisset"
                   @if($inputObject['required'] == true) required @endif
                   @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif
                   @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif>
            <input type="text" inputmode="numeric" maxlength="4" minlength="4"
                   class="form-control @isset($inputObject['input_custom_class']){{$inputObject['input_custom_class']}} @endisset"
                   @if($inputObject['required'] == true) required @endif
                   @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif
                   @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif>
            <input type="text" inputmode="numeric" maxlength="4" minlength="4"
                   class="form-control @isset($inputObject['input_custom_class']){{$inputObject['input_custom_class']}} @endisset"
                   @if($inputObject['required'] == true) required @endif
                   @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif
                   @if(isset($inputObject['reverse_direction']) && $inputObject['reverse_direction'] == true) dir="ltr" @endif>
        </div>
        <input type="hidden"
               id="{{ $inputObject['id'] }}"
               name="{{ $inputObject['name'] }}"
               placeholder="{{ $inputObject['placeholder'] }}"
               value="@if(isset($inputObject['default_value'])){{ $inputObject['default_value'] }}@else{{ old($inputObject['name']) }}@endif"
               @if($inputObject['required'] == true) required @endif
               @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif>
    </div>
@endisset


