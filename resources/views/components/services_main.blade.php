<div class="main__services">
    <div class="heading">Наши услуги</div>
    <div class="content__blocks about-block">
        @foreach (\App\Models\Post::where('category_id','3')->get() as $item)
        <div class="service__card fade-in">
            @if ($item->preview)
            <picture>
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 848, 424, '', 50) }}"
                    media="(min-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 768, 384, '', 80) }}"
                    media="(max-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/webp">

                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 848, 424, '', 80) }}"
                    media="(min-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 768, 384, '', 80) }}"
                    media="(max-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/jpeg">
                <img src="{{ ImageHelper::thumb($item->preview, 'jpg', 848, 424, '', 80) }}" alt="Услуга {{$item->title}} - Группа компаний Дива">
            </picture>
            
            @else
            <img src="{{ asset('img/1.jpg') }}" alt="">

            <picture>
                <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 848, 424, '', 50) }}"
                    media="(min-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 768, 384, '', 80) }}"
                    media="(max-width: 768px)" type="image/webp">
                <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/webp">

                <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 848, 424, '', 80) }}"
                    media="(min-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 768, 384, '', 80) }}"
                    media="(max-width: 768px)" type="image/jpeg">
                <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 400, 200, '', 80) }}"
                    media="(max-width: 500px)" type="image/jpeg">
                <img src="{{ ImageHelper::thumb('1.jpg', 'jpg', 848, 424, '', 80) }}" alt="Услуга {{$item->title}} - Группа компаний Дива">
            </picture>
            @endif
          
            <a href="{{ $item->category->slug }}/{{ $item->slug }}" class="card__name">{{$item->title}}</a>

        </div>
        @endforeach
        
    </div>
</div>
