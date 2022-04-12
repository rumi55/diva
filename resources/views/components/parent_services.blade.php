@if ($categories->count())
    <div class="services__section">

        <div class="services__list">
            @foreach ($categories as $category)
                <div class="services__item">
                    <a href="/{{ $category->slug }}" title="{{ $category->title }}">
                        @if ($category->preview)
                            <div class="service__img">
                                <picture>
                                    <source srcset="{{ ImageHelper::thumb($category->preview, 'webp', 480, 270, '', 60) }}"
                                        type="image/webp">
                                    <source srcset="{{ ImageHelper::thumb($category->preview, 'jpg', 480, 270, '', 60) }}"
                                        type="image/jpeg">
                                    <img src="/storage/{{ $category->preview }}" alt="{{ $category->title }}" loading="lazy">
                                </picture>
                            </div>
                        @else
                            <div class="services__img">
                                <img src="{{ asset('img/1.jpg') }}" alt="{{ $category->title }}">
                            </div>
                        @endif
                        <div class="service__title">
                            {{ $category->title }}
                        </div>
                    </a>
                    <div class="service__button">
                        <a href="/{{ $category->slug }}" title="{{ $category->title }}">Подробнее</a>
                    </div>

                </div>

                @foreach ($category->childrenCategories as $childCategory)
                    @include('child_category', ['child_category' => $childCategory])
                @endforeach
            @endforeach
        </div>

    </div>
@endif
