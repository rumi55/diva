<div class="production__product">
    <h2>Мы поставляем</h2>
    <div class="product__list">
        @forelse (\App\Models\Product::orderBy('position')->get() as $item)
            <div class="product__item">
                <div class="product__img">
                    <img src="/storage/{{ $item->preview }}" alt="">
                </div>
                <div class="product__name">
                    {{ $item->title }}
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>
