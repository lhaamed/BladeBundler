@if(\BladeBundler\BB::isForm($formBundle))
    <form action="{{ $formBundle->action }}" @if($formBundle->support_file) enctype="multipart/form-data" @endif
    method="{{ $formBundle->method }}" {!! $formBundle->custom_html_tags !!}>
        @if($formBundle->hasCSRF)
            @csrf
        @endif
        @if(isset($formBundle->alter_method))
            @method($formBundle->alter_method)
        @endif


            @if(count($formBundle->tabs) == 1)

                @foreach($formBundle->tabs[0]->sections as $section)
                    @if($section instanceof \BladeBundler\classes\formBundle\partials\Section)
                        <section
                            class="d-flex flex-column my-4 px-4 @isset($section->title) titled-section @endisset {{ $formBundle->each_section_default_class }} {{ $section->custom_class }}">
                            @isset($section->title)
                                <div class="section-title col-12 pl-0 pb-4" style="transform: translateX(12px)">
                                    <h5 class="d-inline bg-white px-2">{!! $section->title !!}</h5>
                                </div>
                            @endisset
                            @foreach($section->rows as $row)
                                @if($row instanceof \BladeBundler\classes\formBundle\partials\Row)
                                    <div class="form-row row mb-2 {{ $section->each_row_default_class }} {{ $row->custom_class }}">
                                        @foreach($row->cells as $cell)
                                            @if($cell instanceof \BladeBundler\classes\formBundle\partials\Cell)
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

                <nav class="tab-navigator mb-5">
                    <div class="nav nav-pills gap-2" id="tab-navigator" role="tablist">
                        @foreach($formBundle->tabs as $key => $tab)
                            @if($tab instanceof \BladeBundler\classes\formBundle\partials\Tab)
                                <button class="nav-link @if(!$key) active @endif" id="{{ $tab->unique_id }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tab->unique_id }}"
                                        type="button" role="tab" aria-controls="{{ $tab->unique_id }}" aria-selected="false">
                                    <span>{{ $tab->title }}</span>
                                </button>
                            @endif
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($formBundle->tabs as $key => $tab)
                        @if($tab instanceof \BladeBundler\classes\formBundle\partials\Tab)
                            <div class="tab-pane fade @if(!$key) show active @endif" id="{{ $tab->unique_id }}" role="tabpanel" aria-labelledby="{{ $tab->unique_id }}-tab" tabindex="{{  $key }}">
                                @foreach($tab->sections as $section)
                                    @if($section instanceof \BladeBundler\classes\formBundle\partials\Section)
                                        <section
                                            class="d-flex flex-column my-4 px-4 @isset($section->title) titled-section @endisset {{ $formBundle->each_section_default_class }} {{ $section->custom_class }}">
                                            @isset($section->title)
                                                <div class="section-title col-12 pl-0 pb-4" style="transform: translateX(12px)">
                                                    <h5 class="d-inline bg-white px-2">{!! $section->title !!}</h5>
                                                </div>
                                            @endisset
                                            @foreach($section->rows as $row)
                                                @if($row instanceof \BladeBundler\classes\formBundle\partials\Row)
                                                    <div class="form-row row mb-2 {{ $section->each_row_default_class }} {{ $row->custom_class }}">
                                                        @foreach($row->cells as $cell)
                                                            @if($cell instanceof \BladeBundler\classes\formBundle\partials\Cell)
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



{{--


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
            </div>


--}}










        <div class="text-right">
            <button class="btn btn-primary {{ $formBundle->submit_button['custom_class'] }}"
                    type="submit">{!! $formBundle->submit_button['title'] !!}</button>
            @isset($formBundle->submit_side_links)
                @include('theme.sleek.components.links',['links' => $formBundle->submit_side_links])
            @endisset
        </div>
    </form>
@else
    @dd('something went wrong!')
@endif
