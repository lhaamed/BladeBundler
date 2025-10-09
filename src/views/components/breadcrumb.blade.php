@php
    use lhaamed\BladeBundler\BB;
@endphp
@props([
    'breadcrumb' => null
])


@if(BB::isBreadcrumbBundle($breadcrumb))
    <nav class="breadcrumb" aria-label="breadcrumb">
        <div class="main-bread">
            <div class="page-title">
                <h3>{{ $breadcrumb->title }}</h3>
            </div>
            @isset($breadcrumb->items)
                <ol class="breadcrumb">
                    @foreach($breadcrumb->items as $item)
                        @if(isset($item->href))
                            <li class="breadcrumb-item">
                                <a href="{{ $item->href }}">
                                    <span>{{ $item->title }}</span>
                                </a>
                            </li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>{{ $item->title }}</span>
                            </li>
                        @endif
                    @endforeach
                </ol>
            @endisset
        </div>

        <div class="other-bread">
            @if(isset($breadcrumb->links) && BB::isLinkBundle($breadcrumb->links) && count($breadcrumb->links->links))
                <x-BladeBundler::links :links="$breadcrumb->links"/>
            @endif
        </div>
    </nav>

@endif



