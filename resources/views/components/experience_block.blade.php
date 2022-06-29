@foreach ($post->blocks->where('type', 'experience') as $item)
    <div class="experience__block">
        <div class="exp__heading">
            @if($item->name)
            {{ $item->name }}
            @endif
        </div>
        <div class="exp__content">
            @foreach ($item->repeater as $item)
                <div class="exp__item fade-in">
                    <div class="exp__number"><span>{{ $item['number'] }}</span> {{ $item['title'] }}</div>

                    <div class="exp__text">{{ $item['description'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
{{-- <div class="experience__block">
    <div class="exp__heading">
        Опыт команды ГК «ДИВА» это:
    </div>
    <div class="exp__content">
        <div class="exp__item">
            <div class="exp__number"><span>14 780</span> тонн</div>
         
            <div class="exp__text">выращенной продукции растениеводства</div>
        </div>
        <div class="exp__item">
            <div class="exp__number"><span>48</span> договора контрактации</div>
            <div class="exp__text">заключенных с российскими сельхозпроизводителями</div>
        </div>
        <div class="exp__item">
            <div class="exp__number"><span>36</span> <p>импортных контрактов</p></div>
            <div class="exp__desc"></div>
            <div class="exp__text">заключённых с зарубежными сельхозпроизводителями</div>
        </div>
        <div class="exp__item">
            <div class="exp__number"><span>61 484</span> рейса</div>
           
            <div class="exp__text">доставки свежей зелени и овощей специализированным автотранспортом</div>
        </div>
        <div class="exp__item">
            <div class="exp__number"><span>60 930</span> тонн</div>
        
            <div class="exp__text">свежих овощей, поставленных компаниями продуктового Retail и HoReCa</div>
        </div>
    </div>
</div> --}}