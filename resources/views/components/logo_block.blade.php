@foreach ($post->blocks->where('type', 'logo') as $item)
    <div class="partners__logo fade-in">

        @foreach (array_reverse($item->gallery) as $logo)
            <img src="/storage/{{ $logo }}" alt="">
        @endforeach
        {{-- <div class="partners__offer">
            <span>Хотите работать с нами?</span>
            <a href="/o-nas">Узнать больше</a>
        </div> --}}
    </div>
@endforeach

