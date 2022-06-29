<div class="production__product">
    <h2>Мы поставляем</h2>
    <div class="product__list all__prod">
        @forelse (\App\Models\Product::orderBy('position')->get() as $item)
            <div class="product__item fade-in">
                <div class="product__img">
                    <picture>
                        <source srcset="{{ ImageHelper::thumb($item->preview, 'webp', 350, 350, '', 100) }}"
                            media="(min-width: 768px)" type="image/webp">
                        <source srcset="{{ ImageHelper::thumb($item->preview, 'png', 350, 350, '', 9) }}"
                            media="(max-width: 768px)" type="image/png">
                        <img src="/storage/{{ $item->preview }}" alt="">
                    </picture>
                </div>
                <div class="product__name">
                    {{ $item->title }}
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>
