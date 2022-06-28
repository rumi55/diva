@foreach ($post->blocks->where('type', 'about') as $item)
    <div class="about__block ">
        @if ($item->name)
            <div class="about__heading home-intro">
                <h2>{{ $item->name }}</h2>
            </div>
        @endif
        <div class="about__list about-block">
            @foreach ($item->repeater as $repeater)
                <div class="about__item fade-in">
                    @if ($repeater['picture'])
                        <div class="about__logo"><img src="/storage/{{ $repeater['picture'] }}" alt=""></div>
                    @endif


                    <div class="about__text">
                        {!! $repeater['description'] !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
