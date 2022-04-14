<div class="team__block">
    <div class="team__heading">
        <h2>ГК «ДИВА» - КОМАНДА ПРОФЕССИОНАЛОВ</h2>
        <p>Образованная в 2022 году ГК «ДИВА» объединила многолетний опыт профессионалов своего дела.
        </p>
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
