@foreach (\App\Models\Block::where('type', 'about')->get() as $item)
    <div class="about__block">
        <div class="about__heading">
            <h2>{{ $item->title }}</h2>
        </div>
        <div class="about__list">
            @foreach ($item->repeater as $repeater)
                <div class="about__item">
                    <div class="about__logo"><img src="/storage/{{ $repeater['picture'] }}" alt=""></div>

                    <div class="about__text">
                        {{ $repeater['description'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach