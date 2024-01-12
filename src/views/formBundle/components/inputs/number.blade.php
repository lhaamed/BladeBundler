@isset($inputObject)
    <input class="form-control"
           type="{{ $inputObject['type'] }}"
           id="{{ $inputObject['id'] }}"
           name="{{ $inputObject['name'] }}"
           placeholder="{{ $inputObject['placeholder'] }}"
           @if(isset($inputObject['min']))
           min="{{ $inputObject['min'] }}"
           @endif
           @if(isset($inputObject['max']))
           max="{{ $inputObject['max'] }}"
           @endif

           @if(isset($inputObject['step']))
           step="{{ $inputObject['step'] }}"
           @endif
           value="@if(isset($inputObject['default_value'])){{ $inputObject['default_value'] }}@else{{ old($inputObject['name']) }}@endif"
           @if($cell['required'] == true) required @endif>
@endisset


