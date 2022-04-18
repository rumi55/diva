<div class="team__block">
    <div class="team__heading">
        @if ($item->name)
        <h2>{{ $item->name }}</h2>
        @endif
        @if ($item->content)
        {!! $item->content !!}
            @endif
        @if ($item->content2)
        <div class="team__blockquote">{!! $item->content2 !!}</div>
        @endif
           
        
    </div>

    <div class="team__list">
        @foreach (\App\Models\Team::where('active', true)->get() as $item)
            <div class="team__item">
                <div class="team__img">
                    <picture>
                        <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 207, 276, '', 80) }}"
                            media="(max-width: 500px)" type="image/webp">

                        <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 207, 276, '', 80) }}"
                            media="(max-width: 500px)" type="image/jpeg">
                        <img src="storage/{{ $item->preview }}" alt="хлебные крошки">
                    </picture>
                </div>
                <div class="team__content">
                    <div class="team__name">{{ $item->title }}</div>
                    <div class="team__desc">{{ $item->description }}</div>
                    <div class="team__text">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
