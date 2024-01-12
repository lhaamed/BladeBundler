@isset($inputObject)
    @php($inputObject['input_custom_class'] = 'typeahead')
    <div class="tt-autocomplete" api_path="{{ $inputObject['API_path'] }}">
        <input class="form-control @isset($inputObject['input_custom_class']){{$inputObject['input_custom_class']}}@endisset"
               type="text" data-provide="typeahead" autocomplete="off"
               id="{{ $inputObject['id'] }}"
               name="{{ $inputObject['name'] }}"
               placeholder="{{ $inputObject['placeholder'] }}"
               value="@if(isset($inputObject['default_value'])){{ $inputObject['default_value'] }}@else{{ old($inputObject['name']) }}@endif">
        {{--    <span class="form-control-feedback d-block mt-2"></span>--}}
        @isset($inputObject['hidden'])
            @include('theme.sleek.components.inputs.hidden',['inputObject' => $inputObject['hidden']])
        @endisset
    </div>
@endisset


