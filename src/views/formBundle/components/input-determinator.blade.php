@if($cell['type'] == 'hidden')
    @include('theme.admin.sleek.components.forms.partials.hidden',['inputObject' => $cell])
@elseif($cell['type'] == 'check-box')
    @include('theme.admin.sleek.components.forms.partials.check-box',['inputObject' => $cell])
@else




    <div
        class="form-group {{ $cell['cell_custom_class'] }} @isset($row) {{ $row->each_cell_default_class }} @endisset">
        <label class="mx-2" for="{{ $cell['id'] }}">{{ $cell['label'] }}
            @if($cell['required'] == true) * @endif</label>
        @if(in_array($cell['type'],['text','email','password','tel']))
            @include('theme.admin.sleek.components.forms.partials.input',['inputObject' => $cell])
        @elseif($cell['type'] == 'number')
            @include('theme.admin.sleek.components.forms.partials.number',['inputObject' => $cell])
        @elseif($cell['type'] == 'color')
            @include('theme.admin.sleek.components.forms.partials.color',['inputObject' => $cell])
        @elseif($cell['type'] == 'select')
            @include('theme.admin.sleek.components.forms.partials.select',['inputObject' => $cell])
        @elseif($cell['type'] == 'textarea')
            @include('theme.admin.sleek.components.forms.partials.textarea',['inputObject' => $cell])
        @elseif($cell['type'] == 'file')
            @include('theme.admin.sleek.components.forms.partials.file',['inputObject' => $cell])
        @elseif($cell['type'] == 'image')
            @include('theme.admin.sleek.components.forms.partials.image',['inputObject' => $cell])
        @elseif($cell['type'] == 'typeahead')
            @include('theme.admin.sleek.components.forms.partials.typeahead',['inputObject' => $cell])
        @elseif($cell['type'] == 'mobile')
            @include('theme.admin.sleek.components.forms.partials.mobile',['inputObject' => $cell])
        @endif

        @if ($errors->has($cell['id']))
            <span class="invalid-feedback" role="alert">{{ $errors->first($cell['id']) }}</span>
        @endif
    </div>
@endif
