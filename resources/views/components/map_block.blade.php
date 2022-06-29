<div class="map__section fade-in">
    <div class="map__code fade-in">
        <div style="position:relative;overflow:hidden;"><a
                href="https://yandex.ru/maps/47/nizhny-novgorod/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:0px;">Нижний Новгород</a><a
                href="https://yandex.ru/maps/geo/nizhniy_novgorod/53105078/?ll=43.829834%2C56.245413&utm_medium=mapframe&utm_source=maps&z=10.38"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Нижний Новгород — Яндекс Карты</a><iframe
                src="https://yandex.ru/map-widget/v1/-/CCUBmDabWA" width="100%" height="100%" frameborder="1"
                allowfullscreen="true" style="position:relative;" loading="lazy"></iframe></div>
    </div>
    <div class="map__content fade-in">
        <div class="map__header">Связаться с нами</div>
        <div class="map__text">
            <div><span>Адрес:</span><p>{{ $site->address_full }}</p></div>
            <div class="map__phone">
                <div><span>Отдел продаж:</span><a
                        href="tel:{{ str_replace([' ', '(', ')', '-'], '', $site->phone) }}">{{  $site->phone}}</a>
                </div>
                <div><span>Отдел закупок:</span><a
                        href="tel:{{ str_replace([' ', '(', ')', '-'], '', $site->phone2) }}">{{ $site->phone2 }}</a>
                </div>
            </div>
            <div><span>Email:</span><a
                    href="mailto:{{ $site->email }}">{{ $site->email }}</a>
            </div>
        </div>
    </div>
</div>
