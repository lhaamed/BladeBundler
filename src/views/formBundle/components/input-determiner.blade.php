@if($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\hiddenCell)
    @include('BladeBundler::formBundle.components.inputs.hidden',['cell' => $cell])
@elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\checkboxCell)
    @include('BladeBundler::formBundle.components.inputs.check-box',['cell' => $cell])
@else

    <div class="form-group {{ $cell->custom_class }} @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @isset($cell->label)
            <label for="{{ $cell->id }}" class="mx-2">{{ $cell->label }} @if($cell->required)
                    *
                @endif</label>
        @endisset


        @if($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\textCell)
            @include('BladeBundler::formBundle.components.inputs.text',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\emailCell)
            @include('BladeBundler::formBundle.components.inputs.text',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\passwordCell)
            @include('BladeBundler::formBundle.components.inputs.text',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\telCell)
            @include('BladeBundler::formBundle.components.inputs.text',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\numberCell)
            @include('BladeBundler::formBundle.components.inputs.number',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\colorCell)
            @include('BladeBundler::formBundle.components.inputs.color',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\selectCell)
            @include('BladeBundler::formBundle.components.inputs.select',['cell' => $cell])
        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\textareaCell)
            @include('BladeBundler::formBundle.components.inputs.textarea',['cell' => $cell])

        @elseif($cell instanceof \BladeBundler\Classes\formBundle\partials\cells\fileCell)
            @include('BladeBundler::formBundle.components.inputs.file',['cell' => $cell])
        @endif
        @if ($errors->has($cell->id))
            <span class="invalid-feedback" role="alert">{{ $errors->first($cell->id) }}</span>
        @endif
    </div>

@endif




{{--

@if($cell['type'] == 'hidden')
    @include('theme.admin.sleek.components.forms.partials.hidden',['inputObject' => $cell])
@elseif($cell['type'] == 'check-box')
    @include('theme.admin.sleek.components.forms.partials.check-box',['inputObject' => $cell])
@else
    <div
        class="form-group {{ $cell['cell_custom_class'] }} @isset($row) {{ $row->each_cell_default_class }} @endisset">


        @elseif($cell['type'] == 'file')
            @include('theme.admin.sleek.components.forms.partials.file',['inputObject' => $cell])
        @elseif($cell['type'] == 'image')
            @include('theme.admin.sleek.components.forms.partials.image',['inputObject' => $cell])
        @elseif($cell['type'] == 'typeahead')
            @include('theme.admin.sleek.components.forms.partials.typeahead',['inputObject' => $cell])
        @elseif($cell['type'] == 'mobile')
            @include('theme.admin.sleek.components.forms.partials.mobile',['inputObject' => $cell])
        @endif

    </div>
@endif
--}}
