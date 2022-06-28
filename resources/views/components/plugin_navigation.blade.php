<ul>
    @foreach(FilamentNavigation::get('topmenu')->items as $item)
        <li>
            {{ $item['label'] }}
 
            @if($item['children'])
                <ul>
                    {{-- Render the item's children here... --}}
                </ul>
            @endif
        </li>
    @endforeach
</ul>