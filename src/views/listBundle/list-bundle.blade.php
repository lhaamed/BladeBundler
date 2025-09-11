@if(\BladeBundler\BB::isList($listBundle))
    <table class="table table-responsive table-hover">
        <thead class="table-dark">
        <tr>
            @foreach($listBundle->table['headers'] as $headItem)
                <th scope="col">{{ $headItem }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @if(count($listBundle->table['records']))
            @foreach($listBundle->table['records'] as $record)
                <tr>
                    @foreach($record as $key => $recordItem)
                        @if(gettype($recordItem) == 'array')
                            <td @if(isset($recordItem['td_custom_class'])) class="{{ $recordItem['td_custom_class'] }}" @endif
                            @if(isset($recordItem['td_custom_HTML_tag'])) {!! $recordItem['td_custom_HTML_tag'] !!} @endif>
                                <div class="td-wrapper @if($key == 'actions') nowrap @endif">
                                    @if($key == 'actions')
                                        @foreach($recordItem as $eachAction)
                                            {!! $eachAction !!}
                                        @endforeach
                                    @else
                                        @foreach($recordItem as $each_item)
                                            {!! $each_item !!}
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                        @else
                            <td>
                                <div class="td-wrapper">
                                    @if(gettype($recordItem) == 'string' || gettype($recordItem) == 'integer')
                                        {!! $recordItem !!}
                                    @endif
                                </div>
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="20">موردی یافت نشد.</td>
            </tr>
        @endif
        </tbody>
    </table>
@else
    @dd('something went wrong!')
@endif
