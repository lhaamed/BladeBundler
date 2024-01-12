@isset($inputObject)
    <input class="form-control"
           type="{{ $inputObject['type'] }}"
           name="{{ $inputObject['name'] }}"
           id="{{ $inputObject['id'] }}"
           value="{{ $inputObject['default_value'] }}">
@endisset


