@if(\BladeBundler\BB::isCell($cell,'hidden'))
    @include('BladeBundler::formBundle.components.inputs.hidden',['cell' => $cell])
@elseif(\BladeBundler\BB::isCell($cell,'checkbox'))
    <div class="{{ $cell->class }} px-1 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @include('BladeBundler::formBundle.components.inputs.check-box',['cell' => $cell])
    </div>

@else
    <div class="{{ $cell->class }} px-1 mb-2 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @isset($cell->label)
            <label for="{{ $cell->id }}" class="mb-1 mx-3 fw-semibold">{{ $cell->label }} @if($cell->isRequired())<span
                    class="text-danger">*</span>@endif</label>
        @endisset
        @if(\BladeBundler\BB::isCellDefined($cell))
            {!! \BladeBundler\BB::showFormCell($cell) !!}
        @endif

        @if($errors->has($cell->id))
            <span class="form-text" role="alert">{{ $errors->first($cell->id) }}</span>
        @elseif($cell->hasHints())
            <div class="mt-2 mb-2" style="font-size: .86rem">
                @foreach($cell->hints as $hint)
                    <span class="d-block form-text text-{{$hint['type']}} px-2"
                          role="alert">{!! $hint['content'] !!}</span>
                @endforeach
            </div>
        @endif
    </div>
@endif
<?php unset($cell); ?>
