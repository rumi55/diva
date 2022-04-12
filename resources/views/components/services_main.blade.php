<div class="main__services">
    <div class="heading">Наши услуги</div>
    <div class="content__blocks">
        @foreach (\App\Models\Post::where('category_id','3')->get() as $item)
        <div class="service__card">
            @if ($item->preview)
            <picture>
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 856, 428, '', 50) }}"
                    media="(min-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 800, 400, '', 80) }}"
                    media="(max-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/webp">

                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 856, 428, '', 80) }}"
                    media="(min-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 800, 400, '', 80) }}"
                    media="(max-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/jpeg">
                <img src="storage/{{ $item->preview }}" alt="хлебные крошки">
            </picture>
            
            @else
            <img src="{{ asset('img/1.jpg') }}" alt="">
            @endif
          
            <a href="{{ $item->category->slug }}/{{ $item->slug }}" class="card__name">{{$item->title}}</a>

        </div>
        @endforeach
        
    </div>
</div>
