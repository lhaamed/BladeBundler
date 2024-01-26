@if(isset($linkBundle))
    <div class="links-wrapper">
        @if(count($linkBundle->links))
            @foreach($linkBundle->links as $link)

                @if(\BladeBundler\BB::isLink($link))
                    <a href="{{ $link->href }}"
                       class="btn @isset($linkBundle->each_link_style) {{ $linkBundle->each_link_style }} @endisset  @isset($link->custom_style) {{ $link->custom_style }} @endisset">
                        <span>{{ $link->title }}</span>
                        @isset($link->icon)
                            @include('fs.fs-icon',['icon' => $link->icon])
                        @endisset
                    </a>
                @else
                    @dd('linkItem class failure')
                @endif
            @endforeach
        @endisset

    </div>
@endif
