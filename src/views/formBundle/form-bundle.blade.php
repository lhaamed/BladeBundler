<form action="{{ $formBundle->action }}"
      method="{{ $formBundle->method }}" {!! $formBundle->custom_html_tags !!}>
    @if($formBundle->hasCSRF)
        @csrf
    @endif
    @if(isset($formBundle->alter_method))
        @method($formBundle->alter_method)
    @endif
    @foreach($formBundle->sections as $section)
        @if($section instanceof \BladeBundler\Classes\FormBundle\partials\Section)

{{--            @dd($section)--}}
            <section
                class="d-flex flex-column my-4 px-4 @isset($section->title) titled-section @endisset {{ $formBundle->each_section_default_class }} {{ $section->custom_class }}">
                @isset($section->title)
                    <div class="col-12 pl-0 pb-4" style="transform: translateX(12px)">
                        <h5 class="d-inline bg-white px-2">{!! $section->title !!}</h5>
                    </div>
                @endisset
                @foreach($section->rows as $row)

                    @if($row instanceof \BladeBundler\Classes\FormBundle\partials\Row)
                        <div class="form-row {{ $section->each_row_default_class }} {{ $row->custom_class }}">
                            @foreach($row->cells as $cell)
                                @if($cell instanceof \BladeBundler\Classes\FormBundle\partials\Cell)
                                    @include('BladeBundler::formBundle.components.input-determiner',['cell' => $cell])
                                @endif

                            @endforeach
                        </div>
                    @endif
                @endforeach
            </section>

        @endif
    @endforeach
    <div class="text-right">
        <button class="btn btn-primary {{ $formBundle->submit_button['custom_class'] }}"
                type="submit">{!! $formBundle->submit_button['title'] !!}</button>
        @isset($formBundle->submit_side_links)
            @include('theme.sleek.components.links',['links' => $formBundle->submit_side_links])
        @endisset
    </div>
</form>
