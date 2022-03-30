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
                    <img src="/storage/{{ $item->preview }}" alt="">
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
