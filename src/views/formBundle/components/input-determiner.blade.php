@if(\BladeBundler\BB::isCell($cell,'hidden'))
    @include('BladeBundler::formBundle.components.inputs.hidden',['cell' => $cell])
@elseif(\BladeBundler\BB::isCell($cell,'checkbox'))
    <div class="{{ $cell->class }} px-1 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @include('BladeBundler::formBundle.components.inputs.check-box',['cell' => $cell])
    </div>

@else
    <div class="{{ $cell->class }} px-1 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @isset($cell->label)
            <label for="{{ $cell->id }}" class="mb-2">{{ $cell->label }} @if($cell->isRequired())*@endif</label>
        @endisset
        @if(\BladeBundler\BB::isCellDefined($cell))
            {!! \BladeBundler\BB::showFormCell($cell) !!}
        @endif

        @if ($errors->has($cell->id))
            <span class="invalid-feedback" role="alert">{{ $errors->first($cell->id) }}</span>
        @endif
    </div>
@endif
<?php unset($cell); ?>
