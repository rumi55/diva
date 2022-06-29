
@if ($post->gallery)
    <div class="gallery__block about-block">


        @if ($post->gallery_name)
            <div class="gallery__heading fade-in">
                <p class="h2">{{ $post->gallery_name }}</p>
                <p>{{ $post->gallery_description }}</p>
            </div>
        @endif

        <div class="gallery__images " id="anchor-tag">
            @foreach (array_reverse($post->gallery) as $item)
                <a href="/storage/{{ $item }}" class="fade-in">
                    <picture>
                        <source srcset="{{ ImageHelper::thumb($item, 'webp', 560, 315, '', 50) }}"
                             type="image/webp">
                        <source srcset="{{ ImageHelper::thumb($item, 'png', 560, 315, '', 7) }}"
                             type="image/png">
                            <source srcset="{{ ImageHelper::thumb($item, 'jpg', 560, 315, '', 60) }}"
                             type="image/jpeg">
                        <img src="/storage/{{ $item }}" alt="Фотографии ГК Дива">
                    </picture>
                </a>
            @endforeach
        </div>
    </div>
@endif

