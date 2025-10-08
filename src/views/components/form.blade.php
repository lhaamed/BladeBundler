@php
    use lhaamed\BladeBundler\BB;
    use lhaamed\BladeBundler\classes\formBundle\partials\Cell;
    use lhaamed\BladeBundler\classes\formBundle\partials\Row;
    use lhaamed\BladeBundler\classes\formBundle\partials\Section;
    use lhaamed\BladeBundler\classes\formBundle\partials\Tab;
@endphp

@props([
    'form' => null
])


@if(BB::isForm($form))
    <form action="{{ $form->action }}" @if($form->support_file) enctype="multipart/form-data" @endif
    method="{{ $form->method }}"
          {!! $form->custom_html_tags !!} class="@if(BB::isSearchForm($form)) search-bundler @else form-bundler @endif">
        @if($form->hasCSRF)
            @csrf
        @endif
        @if(isset($form->alter_method))
            @method($form->alter_method)
        @endif
        @if(count($form->tabs) == 1)
            @foreach($form->tabs[0]->sections as $section)
                @if($section instanceof Section)
                    <section
                        class="d-flex flex-column mx-2 @isset($section->title) titled-section @endisset {{ $form->each_section_default_class }} {{ $section->custom_class }}">
                        @isset($section->title)
                            <div class="section-title col-12 pl-0 pb-4" style="transform: translateX(12px)">
                                <h5 class="d-inline px-2">{!! $section->title !!}</h5>
                            </div>
                        @endisset
                        @foreach($section->rows as $row)
                            @if($row instanceof Row)
                                <div
                                    class="form-row row mb-2 {{ $section->each_row_default_class }} {{ $row->custom_class }}">
                                    @foreach($row->cells as $cell)
                                        @if($cell instanceof Cell)
                                            @include('BladeBundler::formBundle.components.input-determiner',['cell' => $cell])
                                        @endif

                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </section>
                @endif
            @endforeach
        @else
            <nav class="tab-navigator mb-4 mx-2">
                <div class="nav nav-pills gap-2 pb-3 px-3" id="tab-navigator" role="tablist">
                    @foreach($form->tabs as $key => $tab)
                        @if($tab instanceof Tab)
                            <button class="nav-link @if(!$key) active @endif" id="{{ $tab->unique_id }}-tab"
                                    data-bs-toggle="tab" data-bs-target="#{{ $tab->unique_id }}"
                                    type="button" role="tab" aria-controls="{{ $tab->unique_id }}"
                                    aria-selected="false">
                                <span>{{ $tab->title }}</span>
                            </button>
                        @endif
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach($form->tabs as $key => $tab)
                    @if($tab instanceof Tab)
                        <div class="tab-pane fade @if(!$key) show active @endif" id="{{ $tab->unique_id }}"
                             role="tabpanel" aria-labelledby="{{ $tab->unique_id }}-tab" tabindex="{{  $key }}">
                            @foreach($tab->sections as $section)
                                @if($section instanceof Section)
                                    <section
                                        class="d-flex flex-column mx-2 @isset($section->title) titled-section @endisset {{ $form->each_section_default_class }} {{ $section->custom_class }}">
                                        @isset($section->title)
                                            <div class="section-title col-12 pl-0 pb-4"
                                                 style="transform: translateX(12px)">
                                                <h5 class="d-inline px-2">{!! $section->title !!}</h5>
                                            </div>
                                        @endisset
                                        @foreach($section->rows as $row)
                                            @if($row instanceof Row)
                                                <div
                                                    class="form-row row mb-2 {{ $section->each_row_default_class }} {{ $row->custom_class }}">
                                                    @foreach($row->cells as $cell)
                                                        @if($cell instanceof Cell)
                                                            @include('BladeBundler::formBundle.components.input-determiner',['cell' => $cell])
                                                        @endif

                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </section>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        <div class="text-right">
            <button class="btn btn-primary {{ $form->submit_button['custom_class'] }}"
                    type="submit">{!! $form->submit_button['title'] !!}</button>
            @isset($form->submit_side_links)
                @include('theme.sleek.components.links',['links' => $form->submit_side_links])
            @endisset
        </div>
    </form>
@else
    @dd('something went wrong!')
@endif
