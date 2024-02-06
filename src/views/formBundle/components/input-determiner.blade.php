@if(\BladeBundler\BB::isCell($cell,'hidden'))
    @include('BladeBundler::formBundle.components.inputs.hidden',['cell' => $cell])
@elseif(\BladeBundler\BB::isCell($cell,'check-box'))
    @include('BladeBundler::formBundle.components.inputs.check-box',['cell' => $cell])
@else
    <div class="form-group {{ $cell->class }} @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @isset($cell->label)
            <label for="{{ $cell->id }}" class="mx-2">{{ $cell->label }} @if($cell->required)
                    *
                @endif</label>
        @endisset
        @if(\BladeBundler\BB::isCellAny($cell,['text','email','tel']))
            @include('BladeBundler::formBundle.components.inputs.text',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'password'))
            @include('BladeBundler::formBundle.components.inputs.password',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'number'))
            @include('BladeBundler::formBundle.components.inputs.number',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'textarea'))
            @include('BladeBundler::formBundle.components.inputs.textarea',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'color'))
            @include('BladeBundler::formBundle.components.inputs.color',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'select'))
            @include('BladeBundler::formBundle.components.inputs.select',['cell' => $cell])
        @elseif(\BladeBundler\BB::isCell($cell,'file'))
            @include('BladeBundler::formBundle.components.inputs.file',['cell' => $cell])
        @endif
        @if ($errors->has($cell->id))
            <span class="invalid-feedback" role="alert">{{ $errors->first($cell->id) }}</span>
        @endif
    </div>
@endif
<?php unset($cell); ?>
