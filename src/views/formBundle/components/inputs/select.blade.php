@isset($inputObject)
    <select class="form-control {{ $inputObject['select_custom_class'] }}"
            id="{{ $inputObject['id'] }}"
            name="{{ $inputObject['name'] }}"
            @if($inputObject['is_multiple'] == true) multiple @endif
            @if($inputObject['required'] == true) required @endif
            @if(isset($inputObject['disabled']) && $inputObject['disabled'] == true) disabled @endif>
        @if($inputObject['is_multiple'] == false)
            <option
                @if(!isset($inputObject['select_list']['default_value']) && !old($inputObject['name']) !== null) selected
                @endif @if($inputObject['required'] == true) disabled @endif value="">انتخاب نشده...
            </option>
        @endif
        @if(isset($inputObject['select_list']) && in_array(gettype($inputObject['select_list']['list']),['array','object']))
            @foreach($inputObject['select_list']['list'] as $key => $option)
                <option value="{{ $key }}"
                        @if(old($inputObject['name']) !== null && !$inputObject['is_multiple'])
                            @if($key == old($inputObject['name']))
                                selected
                            @endif
                        @elseif($inputObject['is_multiple'] && old($inputObject['id']) !== null && in_array($key,old($inputObject['id'])))
                            selected
                        @elseif((isset($inputObject['select_list']['default_value']) && $inputObject['select_list']['default_value'] !== null))
                            @if($inputObject['is_multiple'])
                                @if(in_array($key,$inputObject['select_list']['default_value'])) selected @endif
                            @else
                                @if(($key == $inputObject['select_list']['default_value'])) selected @endif
                            @endif
                        @endif
                >{!! $option !!}</option>
            @endforeach
        @endif
    </select>
@endisset


