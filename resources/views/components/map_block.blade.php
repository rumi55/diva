<div class="map__section fade-in">
    
    @livewire('contact-form')
   
    <div class="map__content fade-in">
        <div class="map__header">Контакты</div>
        <div class="map__text">
            <div><span>Адрес:</span><p>{{ $site->address_full }}</p></div>
            
                <div><span>Отдел продаж:</span><a
                        href="tel:{{ str_replace([' ', '(', ')', '-'], '', $site->phone) }}">{{  $site->phone}}</a>
                </div>
                <div><span>Отдел закупок:</span><a
                        href="tel:{{ str_replace([' ', '(', ')', '-'], '', $site->phone2) }}">{{ $site->phone2 }}</a>
                </div>
            
            <div><span>Email:</span><a
                    href="mailto:{{ $site->email }}">{{ $site->email }}</a>
            </div>
        </div>
    </div>
</div>
