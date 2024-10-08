@if(\BladeBundler\BB::isCell($cell,'hidden'))
            @if(\BladeBundler\BB::isCellDefined($cell))
                {!! \BladeBundler\BB::showFormCell($cell) !!}
            @endif
@elseif(\BladeBundler\BB::isCell($cell,'checkbox'))
    <div class="form-cell {{ $cell->class }} px-1 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @if($cell->show_label)
            <label for="{{ $cell->id }}" class="mb-1 mx-2 fw-semibold">{{ $cell->show_label }} @if($cell->isRequired())<span
                    class="text-danger">*</span>@endif</label>
        @endif
            @if(\BladeBundler\BB::isCellDefined($cell))
                {!! \BladeBundler\BB::showFormCell($cell) !!}
            @endif
    </div>
@else
    <div class="form-cell {{ $cell->class }} px-1 mb-2 @isset($row) {{ $row->each_cell_default_class }} @endisset">
        @isset($cell->label)
            <label for="{{ $cell->id }}" class="mb-1 mx-2 fw-semibold">{{ $cell->label }} @if($cell->isRequired())<span
                    class="text-danger">*</span>@endif</label>
        @endisset
        @if(\BladeBundler\BB::isCellDefined($cell))
            {!! \BladeBundler\BB::showFormCell($cell) !!}
        @endif
        @if($errors->has($cell->id))
            <div class="feedback-wrapper mt-2 mb-2 ps-3" style="font-size: .86rem">
                <span class="d-block form-text text-danger px-2" role="alert">{{ $errors->first($cell->id) }}</span>
            </div>
        @elseif($cell->hasHints())
            <ol class="hint-wrapper styled mt-2 mb-2 ps-3" style="font-size: .86rem">
                @foreach($cell->hints as $hint)
                    <li class="form-text text-{{$hint['type']}}"
                          role="alert">{!! $hint['content'] !!}</li>
                @endforeach
            </ol>
        @endif
    </div>
@endif
<?php unset($cell); ?>
