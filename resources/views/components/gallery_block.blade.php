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
            @foreach ($post->gallery as $item)
                <a href="/storage/{{ $item }}">
                    <img src="/storage/{{ $item }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
@endif
{{-- @endforeach --}}
