{{-- @foreach (\App\Models\Block::where('type', 'gallery')->get() as $item) --}}
@if ($post->gallery)
    <div class="gallery__block">


        @if ($post->gallery_name)
            <div class="gallery__heading">
                <p class="h2">{{ $post->gallery_name }}</p>
                <p>{{ $post->gallery_description }}</p>
            </div>
        @endif

        <div class="gallery__images" id="anchor-tag">
            @foreach (array_reverse($post->gallery) as $item)
                <a href="/storage/{{ $item }}">
                    <picture>
                        <source srcset="{{ ImageHelper::thumb($item, 'webp', 560, 315, '', 100) }}"
                            media="(min-width: 768px)" type="image/webp">
                        <source srcset="{{ ImageHelper::thumb($item, 'png', 560, 315, '', 9) }}"
                            media="(max-width: 768px)" type="image/png">
                        <img src="/storage/{{ $item }}" alt="хлебные крошки">
                    </picture>
                </a>
            @endforeach
        </div>
    </div>
@endif
{{-- @endforeach --}}
