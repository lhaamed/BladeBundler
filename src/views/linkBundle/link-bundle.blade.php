@if(isset($linkBundle))
    <div class="links-wrapper">
        @if(count($linkBundle->links))
            @foreach($linkBundle->links as $link)
                @if(\lhaamed\BladeBundler\BB::isLink($link))
                    <a href="{{ $link->href }}" target="{{ $link->target }}"
                       class="btn @isset($linkBundle->each_link_style) {{ $linkBundle->each_link_style }}@endisset  @isset($link->custom_style) {{ $link->custom_style }} @endisset">
                        <span>{{ $link->title }}</span>
                        @isset($link->icon)
                            @if(\Illuminate\Support\Facades\View::exists('fs.fs-icon'))
                                @fs($link->icon)
                            @endif
                        @endisset
                    </a>
                @else
                    @dd('linkItem class failure')
                @endif
            @endforeach
        @endisset
    </div>
@endif
