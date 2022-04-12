@if ($posts->count())

    <div class="services__section">
        <div class="services__list">
            @foreach ($posts as $item)
                <div class="services__item">
                    <a href="/{{ $item->category->slug }}/{{ $item->slug }}">
                        @if ($item->preview)
                            <div class="services__img">
                                <picture>
                                    <source
                                        srcset="{{ ImageHelper::thumb($item->preview, 'webp', 480, 270, '', 60) }}"
                                        type="image/webp">
                                    <source srcset="{{ ImageHelper::thumb($item->preview, 'jpg', 480, 270, '', 60) }}"
                                        type="image/jpeg">
                                    <img src="/storage/{{ $item->preview }}" alt="{{ $item->title }}"
                                        loading="lazy">
                                </picture>
                            </div>
                        @else
                            <div class="services__img">
                                <img src="{{ asset('img/1.jpg') }}" alt="{{ $item->title }}">
                            </div>
                        @endif
                        <div class="service__title">
                            {{ $item->title }}
                        </div>
                    </a>
                    <div class="service__button">
                        <a href="/{{ $item->category->slug }}/{{ $item->slug }}" title="{{ $item->title }}">
                            Подробнее</a>
                    </div>
                </div>
            @endforeach
            @if ($posts->links())
                {{ $posts->links() }}
            @endif

        </div>
    </div>
    </div>
@endif
