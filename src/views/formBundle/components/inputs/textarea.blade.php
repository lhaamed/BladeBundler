@isset($inputObject)
    <textarea
        class="form-control"
        name="{{ $inputObject['name'] }}"
        placeholder="{{ $inputObject['placeholder'] }}"
        @if($inputObject['required'] == true) required @endif rows="8"
        id="{{ $inputObject['id'] }}">@if(isset($inputObject['default_value'])){{ $inputObject['default_value'] }}@else{{ old($inputObject['name']) }}@endif</textarea>
@endisset


