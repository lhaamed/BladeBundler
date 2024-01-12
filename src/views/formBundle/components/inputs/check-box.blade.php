@isset($inputObject)
    <label class="control control-checkbox">
        <span>{{ $cell['label'] }}</span>
        <input type="checkbox" @if(isset($cell['checked']) && $cell['checked'] === true) checked @endif
        id="{{ $inputObject['id'] }}"
               name="{{ $inputObject['name'] }}">
        <div class="control-indicator"></div>
    </label>
@endisset


