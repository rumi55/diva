<div class="mapprod__section">
    <div class="mapprod__img">
        <picture>
            <source srcset="{{ ImageHelper::thumb('map.jpg', 'webp', 1600, 800, '', 50) }}"
                 type="image/webp">
            
                <source srcset="{{ ImageHelper::thumb('map.jpg', 'jpg', 1600, 800, '', 60) }}"
                 type="image/jpeg">
            <img src="{{ asset('img/map.jpg') }}" alt="Участок ГК Дива">
        </picture>
        <div class="heading">
            <p class="h2">ООО «РОДИНА»</p>
            <p>Площадь: 799 998 м<sup>2</sup></p>
        </div>
    </div>

    <div class="mapprod__content">
        <div class="mapprod__header">Агрокомплекс</div>
        <div class="mapprod__text">
            <p><span>Кадастровый номер земельного участка:</span> 52:20:1600019:347</p>
            <p><span>Площадь:</span> 799 998 кв.м., в том числе 670 000 кв.м. посевных площадей</p>
            <p><span>Местонахождение:</span> Российская Федерация, Нижегородская область, город областного значения
                Бор, Останскинский с/с.</p>
            <p><span>Участок принадлежит на правах частной собственности учредителю и руководителю ГК «ДИВА» Варежкину
                    Д.Ю.</span></p>


        </div>
        @foreach (\App\Models\Block::where('type', 'map_production')->get() as $item)
            <div class="mapprod__link">
                <a href="{{ $item->name }}" target="_blank">Посмотреть (Росреестр)</a>
            </div>
        @endforeach
    </div>
</div>
